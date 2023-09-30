# Advancelearn Searchable package

<img src="https://banners.beyondco.de/advancelearn%2Fsearch-elequent.png?theme=light&packageManager=composer+require&packageName=advancelearn%2Fsearch-elequent&pattern=topography&style=style_1&description=By+installing+this+package%2C+you+can+easily+search+in+ElQuent+Laravel%2C+even+between+nested+relations&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg&widths=350" alt="advancelearn/search-elequent">


<a name="introduction"></a>

- [English documents](README.md)
- [داکیومنت فارسی](README-FA.md)

## Introduction

By installing this package, you can easily search the values and columns of each model You can use this package in your
Laravel projects
<a name="installation"></a>

## Installation

You can install the package with this command

```php
composer require advancelearn/search-elequent
```

Now you can add the desired trait in any of the models that you want to be searchable

```php
use Advancelearn\SearchElequent\Searchable;

class Order extends Model
{

    use Searchable;
    
    /**
     * Scope to perform a search operation.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string $searchText
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearch($query, string $searchText)
    {
        $searchColumns = ['order_number'];
        $relationColumns = [
            'address.user' => ['email'] // Nested relationship with address and user
        ];
        return $this->search($query, $searchText, $searchColumns, $relationColumns);
    }
    
    /**
     * Define the address relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function address()
    {
        // Define your address relationship logic here
    }
    
}
```

And for example, you can call this scope in your controller and pass the searched value to it:

```php
$searchText = $request->q; // 'DE1253005'
// $searchText2 = "info@gmail.com";
return Order::search($searchText)->get();
```

<a name="conclusion"></a>

## Conclusion

The package you created to add search functionality to Eloquent models is a powerful tool in software development. Using this package, you will be able to perform complex searches in models as well as in tabular and relational relationships of models.

Among the main features of this package, the following can be mentioned:

Ease of use: By defining a simple scope in Eloquent models, this package provides the possibility of performing complex searches easily.

Support for relationships: You can also access tabular and relational relationships of models in your searches, which makes it possible to search for data related to a model.

Extensibility: This package allows you to add search features to all your Eloquent models, so you can create different searches based on your needs and match the unique features of your system.

Improved efficiency: With the ability to search the database based on specific conditions, you can quickly retrieve the data you need and improve the efficiency of your system.

By using this package, improve the ability to search and filter your data and make Laravel software development more simple and efficient.
