## OOP là gì
- là lập trình hỗ trợ công nghệ đối tượng (Object-Oriented Programming) giúp tăng năng xuất và đơn giản hóa công việc xây dựng phần mềm, bảo trì phần mềm
- cho phép lập trình viên tập trung vào các đối tượng giống như trong thực tế.

## Các tính chất của lập trình hướng đối tượng
+ Tính đóng gói:
  - Các dữ liệu và phương thức có liên quan với nhau được đóng gói thành các lớp để tiện cho việc quản lý và sử dụng.
  - Đóng gói còn để che giấu một số thông tin và chi tiết cài đặt nội bộ để bên ngoài không thể nhìn thấy.
+ Tính kế thừa: lớp cha có thể chia sẻ dữ liệu và phương thức cho lớp con kế thừa từ nó, nhờ đó ko phải viết lại các logic chung.
+ Tính trừu tượng: tính chất này giúp chúng ta tập trung vào những vấn đề cốt lõi cần thiết của đối tượng thay vì quan tâm đến cách nó thực hiện. Nó cũng làm tăng khả năng mở rộng khi sử dụng cùng với tính đa hình và kế thừa trong lập trình hướng đối tượng.
+ Tính đa hình: tính đa hình được thể hiện qua việc viết lại các method (hàm) từ class cha thông qua class kế thừa nó hoặc việc triển khai các interface. Hoặc có thể được hiểu là Lớp Con sẽ viết lại những phương thức ở lớp cha (overwrite).

## Các mức độ truy cập của một phương thức
+ private: khắt khe nhất, chỉ trong class khai báo biến này mới có quyền sử dụng.
+ protected: ít khắt khe hơn Private một chút, ở ngoài class không thể truy cập được biến này. Tuy nhiên class con thì có thể.
+ public: có thể truy cập từ mọi nơi thông qua câu lệnh $obj -> tên_biến;

## Class abstract
+ Lớp Abstract sẽ định nghĩa các hàm (phương thức) mà từ đó các lớp con sẽ kế thừa nó và Overwrite lại (tính đa hình).
+ Có thể chứa phương thức thường và phương thức abstract
+ Khi các lớp kế thừa từ một Abstract Class thì các phương thức được đánh dấu là abstract thì bắt buộc phải định nghĩa ở lớp con.
+ Các phương thức này có thể là private, protected, public (ngoại trừ abstract thì ko có private). Sử dụng để làm parent class, chứa các khai báo biến và phương thức giống nhau. Các phương thức riêng biệt sẽ được cài đặt ở sub class.
+ Không hỗ trợ đa kế thừa.

Link tham khảo http://php.net/manual/en/language.oop5.abstract.php

## Class interface
+ Interface là một Template (khuôn mẫu), nó không phải là một lớp đối tượng mà chỉ là một bề nhìn bên ngoài mà nhìn vào đó ta có thể biết được tất cả các hàm của đối tượng implement nó.
+ Interface được định nghĩa để cung cấp một tên hàm chung để có thể triển khai. Interface được xem như là bộ xương để thực hiện. Các phương thức đều là public abstract và cũng không được định nghĩa nội dung, sử dụng để định kiểu đối tượng, nhằm che giấu đi phần code được implement
+ Interface có thể được extends với nhau.
+ 1 class có thể implements nhiều Interface.

Link tham khảo http://php.net/manual/en/language.oop5.interfaces.php

## Namespace
dùng để định danh class, khi khai báo namespace thì chúng ta phải đặt nó ở phía trên cùng của file.
+ Khai báo namespace
```
namespace App\Controllers;

class HomeController
{
    //code
}
```

+ Nạp namespace bằng use
```
use tenNamespace\tenClass;
use App\Controllers\HomeController;
```

+ Khởi tạo đối tượng
```
new tenNamespace\tenClass();
new App\Controllers\HomeController();
```

+ Nếu tên định danh quá dài, chúng ta có thể xem xét dùng từ khóa as để định danh chúng
```
use App\Controllers\HomeController as HomeController;
```

## Anonymous function(hàm ẩn danh)
- nó có thể khai báo, định nghĩa ở bất kỳ đâu và không có khả năng tái sử dụng.
- chỉ tồn tại trong phạm vi của biến mà nó được định nghĩa, vì vậy nếu như biến đó vượt ra ngoài phạm vi thì hàm này cũng không còn tác dụng nữa.
- thường được dùng để gán vào biến, hay được gán vào hàm, class như một tham số.

```
// Hàm thường
function helloWorld()
{
  return "Hello world";
}
echo helloWorld();

// Hàm ẩn danh & gán cho 1 biến
$hello = function () {
  return "Hello world";
}
echo $hello();

// Hàm ẩn danh & gán cho function
function shout ($message)
{
  echo $message();
}

// Call function
shout(function() {
  return "Hello world";
});
```

## Clouse
Cũng là một anonymous function, ngoài ra nó có thể truy cập các biến bên ngoài phạm vi mà nó được tạo ra.

```
// Create a user
$user = "Thỏ 7 màu";

// Create a Closure
$hello = function() use ($user) {
  echo "Hello $user";
};

// Greet the user
$hello(); // Returns "Hello Thỏ 7 màu"
```

Ví dụ trong Laravel

```
Route::get('user/(:any)', function ($name) {
  return "Hello " . $name;
});
```

## Traits
là một module giúp cho chúng ta có thể sử dụng lại các phương thức được khai báo trong trait vào các class khác nhau một cách đơn giản hơn là kế thừa như trước.

+ Các đặc điểm của Traits:
  - Traits có chức năng gom lại các phương thức và thuộc tính mà chúng ta muốn sử dụng lại nhiều lần.
  - Traits như một abstract class ( đều không thể khởi tạo được) nhưng không hoàn toàn giống nhau.
  - Các phương thức trong Traits có thể bị override lại trong class sử dụng nó.
  - Giảm việc lặp code đáp ứng được nguyên tắc(DRY - Don't Repeat Yoursefl).
  - Khắc phục được điểm yếu đơn kế thừa của PHP.

```
class Base {
    public function sayHello() {
        echo 'Hello ';
    }
}

trait SayWorld {
    public function sayHello() {
        parent::sayHello();
        echo 'World!';
    }
}

class MyHelloWorld extends Base {
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
// Output: Hello World!
```

Link tham khảo http://php.net/manual/en/language.oop5.traits.php
## Overriding(Ghi đè)
Trong PHP, nếu như người lập trình tạo ra một phương thức trong lớp con có trùng tên, cùng tham số, cùng kiểu trả về với một phương thức đã được tạo ở lớp cha thì đó được gọi là ghi đè phương thức(Method Overriding)

```
class testParent{
    public function f1(){
        echo 1;
    }
    public function f2(){
        echo 2;
    }
}
class testChild extends testParent{
    // Overriding function f2
    function f2($a) {
        echo $a;
    }
}
$a = new testChild();
$a->f2('Hello You');//It will print Hello You
```

## Overloading(Nạp chồng)
Việc khai báo trong một lớp có nhiều thuộc tính, nhiều phương thức có cùng tên nhưng với các tham số khác nhau (khác kiểu dữ liệu, khác số lượng tham số) gọi là khai báo chồng phương thức (overloading method). Khi được gọi, dựa vào tham số truyền vào, phương thức tương ứng sẽ được thực hiện.

```
class Person
{
    const salary = 10;

    function caculateSalary()
    {
        return self::salary;
    }

    function caculateSalary($hour = 0)
    {
        return self::salary * $hour;
    }
}
$per = new Person();
$per->caculateSalary();
```
Khi chạy đoạn code trên sẽ thông báo lỗi *FATAL ERROR Cannot redeclare Person::caculateSalary()*
Vậy để giải quyết vấn đề overloading trong PHP hỗ trợ hàm function __call($nameMethod,$args). Hàm này có 2 tham số, tham số đầu tiên tên hàm, tham số thứ 2 các tham số của hàm

```
class Person
{
    const salary = 10;

    function __call($nameMethod, $parameter)
    {
        // Tên phương thức khi gọi
        if($nameMethod == 'caculateSalary')
        {
            $hour = count($parameter);
            switch($hour)
            {
                // Không truyền tham số cho hàm
                case 0 :
                    return self::salary;
                // Truyền 1 tham số
                case 1 :
                    return self::salary * $parameter[0];
                default:
                    throw new exception('Bad argument');
            }
        }
        else
        {
            throw new exception("Function $nameMethod does not exists");
        }
    }
}

$per = new Person();
echo $per->caculateSalary();
echo '<br>';
echo $per->caculateSalary(10);
```

## Function static
+ Có thể gọi thuộc tính và phương thức mà không cần khởi tạo đối tượng
+ Khuyết điểm là nếu ta khai báo tĩnh thì chương trình sẽ xử lý lưu trữ toàn cục nên sẽ tốn bộ nhớ hơn
+ Trong PHP có 2 từ khoá đặc biệt là self và static đóng vai trò quan trọng trong các lớp thừa kế các phương thức tĩnh hoặc biến thành viên
  - self đại diện cho cho chính đối tượng khai báo đến nó. Nếu class A thừa kế class B thì có nghĩa rằng self đại diện cho class B.
  - static thì lại đại diện cho chính đối tượng đang gọi đến nó

```
class Monkey
{
    protected static $legs = 4;

    public static function countLegs() {
         return self::$legs;
    }
}

class Human extends Monkey
{
    protected static $legs = 2;
}

echo Human::countLegs() . "\n";
```
Kết quả trả về là 4. Khi sử dụng self thì giá trị của thuộc tính sẽ được tham chiếu về giá trị của thuộc tính trong lớp khai báo nó thay vì lớp hiện tại.

```
class Monkey
{
    protected static $legs = 4;

    public static function countLegs() {
         return static::$legs;
    }
}
echo Human::countLegs() . "\n";
```
Kết quả trả về là 2. Khi sử dụng từ khoá static thì giá trị của thuộc tính sẽ tham chiếu tới giá trị trong lớp hiện tại đang sử dụng để gọi phương thức này.