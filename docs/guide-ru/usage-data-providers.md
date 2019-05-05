Работа с провайдерами данных
===========================

Вы можете использовать [[\yii\data\ActiveDataProvider]] с [[\Yiisoft\Db\Sphinx\Query]] и [[\Yiisoft\Db\Sphinx\ActiveQuery]]:

```php
use yii\data\ActiveDataProvider;
use Yiisoft\Db\Sphinx\Query;

$query = new Query();
$query->from('yii2_test_article_index')->match('development');
$provider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 10,
    ]
]);
$models = $provider->getModels();
```

```php
use yii\data\ActiveDataProvider;
use app\models\Article;

$provider = new ActiveDataProvider([
    'query' => Article::find(),
    'pagination' => [
        'pageSize' => 10,
    ]
]);
$models = $provider->getModels();
```

Однако, если вы хотите использовать преимущества ['facet'](usage-facets.md) или [мета-информацию запроса](usage-meta.md) вам нужно использовать `Yiisoft\Db\Sphinx\ActiveDataProvider`. Он позволяет подготовить общее количество элементов с помощью 'meta' информации запроса и получить результаты фасета:

```php
use Yiisoft\Db\Sphinx\ActiveDataProvider;
use Yiisoft\Db\Sphinx\Query;

$query = new Query();
$query->from('idx_item')
    ->match('foo')
    ->showMeta(true)
    ->facets([
        'brand_id',
        'categories',
    ]);
$provider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 10,
    ]
]);
$models = $provider->getModels();
$facets = $provider->getFacets();
$brandIdFacet = $provider->getFacet('brand_id');
```

> Note: Поскольку смещение и ограничение нумерации страниц могут превышать границы Sphinx 'max_matches', провайдер данных установит 'max_matches'
  автоматически на основании этих значений. Однако, если [[Query::showMeta]] установлен, такая корректировка не выполняется, так как это нарушит подсчет общего количества, поэтому вам придется иметь дело с ограничениями 'max_matches' на свое усмотрение.