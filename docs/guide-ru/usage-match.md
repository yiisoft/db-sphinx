Составление инструкции 'MATCH'
===========================

Использование Sphinx не имеет смысла, если вы не используете его полнотекстовый поиск.
В SphinxQL он предоставляется с помощью инструкции 'MATCH'. Вы всегда можете составить его вручную как часть условия 'where', но если вы используете `Yiisoft\Db\Sphinx\Query`, вы можете сделать это через `Yiisoft\Db\Sphinx\Query::match()`:

```php
use Yiisoft\Db\Sphinx\Query;

$query = new Query();
$rows = $query->from('idx_item')
    ->match($_POST['search'])
    ->all();
```

Пожалуйста обратите внимание, что аргумент инструкции Sphinx 'MATCH' использует сложный внутренний синтаксис для лучшей настройки.
По умолчанию `Yiisoft\Db\Sphinx\Query::match()` будет избегать всех специальных символов, связанных с этим синтаксисом, из его аргумента. Поэтому, если вы хотите использовать сложный оператор 'MATCH', вы должны использовать `Yiisoft\Db\Expression` для этого:

```php
use Yiisoft\Db\Sphinx\Query;
use Yiisoft\Db\Expression;

$query = new Query();
$rows = $query->from('idx_item')
    ->match(new Expression(':match', ['match' => '@(content) ' . Yii::$app->sphinx->escapeMatchValue($_POST['search'])]))
    ->all();
```

> Note: если вы создаете аргумент 'MATCH', обязательно используйте `\Yiisoft\Db\Sphinx\Connection::escapeMatchValue()` для правильного экранирования каких-либо специальных символов, которые могут сломать запрос.

Начиная с версии 2.0.6 вы можете использовать [[\Yiisoft\Db\Sphinx\MatchExpression]] для композиции утверждения 'MATCH'.
Он позволяет создавать выражение 'MATCH' с использованием заполнителей аналогично связанным параметрам, значения которых будут автоматически экранированы с помощью [[\Yiisoft\Db\Sphinx\Connection::escapeMatchValue()]].
Например:

```php
use Yiisoft\Db\Sphinx\Query;
use Yiisoft\Db\Sphinx\MatchExpression;

$rows = (new Query())
    ->match(new MatchExpression('@title :title', ['title' => 'Yii'])) // value of ':title' will be escaped automatically
    ->all();
```

Вы можете использовать [[match()], [[andMatch()]] и [[orMatch()]] для объединения нескольких условий.
Каждое условие может быть задано с использованием синтаксиса массива, аналогичного тому, который используется для [[\Yiisoft\Db\Sphinx\Query:where]].
Например:

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

Вы также можете составлять выражения со специальными операторами, такими как 'MAYBE', 'PROXIMITY' и т.д.
Например:

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
