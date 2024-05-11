# Composing 'MATCH' statement

Sphinx usage does not make sense unless you are using its fulltext search ability.
In SphinxQL it is provided via 'MATCH' statement. You can always compose it manually as a part of the `where`
condition, but if you are using `Yiisoft\Db\Sphinx\Query` you can do it with `Yiisoft\Db\Sphinx\Query::match()`:

```php
use Yiisoft\Db\Sphinx\Query;

$query = new Query();
$rows = $query->from('idx_item')
    ->match($_POST['search'])
    ->all();
```

Please note that Sphinx 'MATCH' statement argument uses complex internal syntax for better tuning.
By default `Yiisoft\Db\Sphinx\Query::match()` will escape all special characters related to this syntax from
its argument. So if you wish to use complex `MATCH` statement, you should use `Yiisoft\Db\Expression` for it:

```php
use Yiisoft\Db\Sphinx\Query;
use Yiisoft\Db\Expression;

$query = new Query();
$rows = $query->from('idx_item')
    ->match(new Expression(':match', ['match' => '@(content) ' . Yii::$app->sphinx->escapeMatchValue($_POST['search'])]))
    ->all();
```

> Note: if you compose `MATCH` argument, make sure to use`\Yiisoft\Db\Sphinx\Connection::escapeMatchValue()` to properly
  escape any special characters, which may break the query.

Since version 2.0.6 you can use `\Yiisoft\Db\Sphinx\MatchExpression` for the `MATCH` statement composition.
It allows composition of the `MATCH` expression using placeholders in similar way as bound parameters, which
values will be automatically escaped using `\Yiisoft\Db\Sphinx\Connection::escapeMatchValue()`.
For example:

```php
use Yiisoft\Db\Sphinx\Query;
use Yiisoft\Db\Sphinx\MatchExpression;

$rows = (new Query())
    ->match(new MatchExpression('@title :title', ['title' => 'Yii'])) // value of ':title' will be escaped automatically
    ->all();
```

You may use `match()`, `andMatch()` and `orMatch()` to combine several conditions.
Each condition can be specified using array syntax similar to the one used for `\Yiisoft\Db\Sphinx\Query:where`.
For example:

```php
use Yiisoft\Db\Sphinx\Query;
use Yiisoft\Db\Sphinx\MatchExpression;

$rows = (new Query())
    ->match(
        // produces '((@title "Yii") (@author "Paul")) | (@content "Sphinx")' :
        (new MatchExpression())
            ->match(['title' => 'Yii'])
            ->andMatch(['author' => 'Paul'])
            ->orMatch(['content' => 'Sphinx'])
    )
    ->all();
```

You may as well compose expressions with special operators like `MAYBE`, `PROXIMITY` etc.
For example:

```php
use Yiisoft\Db\Sphinx\Query;
use Yiisoft\Db\Sphinx\MatchExpression;

$rows = (new Query())
    ->match(
        // produces '@title "Yii" MAYBE "Sphinx"' :
        (new MatchExpression())->match([
            'maybe',
            'title',
            'Yii',
            'Sphinx',
        ])
    )
    ->all();

$rows = (new Query())
    ->match(
        // produces '@title "Yii"~10' :
        (new MatchExpression())->match([
            'proximity',
            'title',
            'Yii',
            10,
        ])
    )
    ->all();
```
