<div dir=rtl>

# Advancelearn Searchable package

<img src="https://banners.beyondco.de/advancelearn%2Fsearch-elequent.png?theme=light&packageManager=composer+require&packageName=advancelearn%2Fsearch-elequent&pattern=topography&style=style_1&description=By+installing+this+package%2C+you+can+easily+search+in+ElQuent+Laravel%2C+even+between+nested+relations&md=1&showWatermark=0&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg&widths=350" alt="advancelearn/search-elequent">


<a name="introduction"></a>

## مقدمه 

با نصب این پکیج، می‌توانید به راحتی مقادیر و ستون‌های هر مدل را جستجو کنید. شما می‌توانید از این پکیج در پروژه‌های لاراول خود استفاده کنید.

<a name="installation"></a>

## نصب 

شما می‌توانید این پکیج را با استفاده از دستور زیر نصب کنید:

```php
composer require advancelearn/search-elequent
```

حالا می‌توانید تریت مورد نظر را در هریک از مدل‌هایی که می‌خواهید جستجوپذیر باشند، اضافه کنید:

```php
use Advancelearn\SearchElequent\Searchable;

class Order extends Model
{

    use Searchable;
    
    /**
     * اسکوپ برای انجام عملیات جستجو.
     *
     * @param \Illuminate\Database\Query\Builder $query
     * @param string $searchText
     * @return \Illuminate\Database\Query\Builder
     */
    public function scopeSearch($query, string $searchText)
    {
        $searchColumns = ['order_number'];
        $relationColumns = [
            'address.user' => ['email'] // رابطه داخلی با آدرس و کاربر
        ];
        return $this->search($query, $searchText, $searchColumns, $relationColumns);
    }
    
    /**
     * تعریف رابطه آدرس.
     *
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function address()
    {
        // منطق رابطه آدرس را اینجا تعریف کنید
    }
    
}

```

و به عنوان مثال، می‌توانید این اسکوپ را در کنترلر خود فراخوانی کرده و مقدار جستجو را به آن ارسال کنید:

```php
$searchText = $request->q; // 'DE1253005'
// $searchText2 = "info@gmail.com";
return Order::search($searchText)->get();

```

<a name="conclusion"></a>

## نتیجه‌گیری 

پکیجی که شما برای افزودن قابلیت جستجو به مدل‌های الوکوئنت ایجاد کرده‌اید، ابزاری قدرتمند در توسعه نرم‌افزار است. با استفاده از این پکیج، شما قادر به انجام جستجوهای پیچیده در مدل‌ها و همچنین در روابط جدولی و نسبیتی مدل‌ها خواهید بود.

در میان ویژگی‌های اصلی این پکیج، موارد زیر قابل ذکر هستند:

سادگی استفاده: این پکیج با تعریف یک اسکوپ ساده در مدل‌های الوکوئنت، امکان انجام جستجوهای پیچیده را به سادگی فراهم می‌کند.

پشتیبانی از روابط: شما همچنین می‌توانید به روابط جدولی و نسبیتی مدل‌ها دسترسی داشته باشید، که این امکان را برای جستجوی داده‌های مرتبط با یک مدل فراهم می‌کند.

قابلیت توسعه: این پکیج به شما امکان افزودن ویژگی‌های جستجو را به تمام مدل‌های الوکوئنت شما می‌دهد، بنابراین شما می‌توانید بر اساس نیازهای خود جستجوهای مختلفی ایجاد کرده و به تطابق با ویژگی‌های منحصر به فرد سیستمتان برسید.

بهبود کارایی: با امکان جستجو در پایگاه داده بر اساس شرایط خاص، شما می‌توانید داده‌های مورد نیاز خود را به سرعت بازیابی کنید و کارایی سیستم خود را بهبود ببخشید.

با استفاده از این پکیج، توانایی جستجو و فیلتر کردن داده‌های خود را بهبود بخشید و توسعه نرم‌افزار‌های لاراول را ساده‌تر و کارآمدتر کنید.

</div>
