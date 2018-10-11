# Web Service

1. Web Service là gì?
+ Web Serice là 1 ứng dụng client server giao tiếp với nhau qua giao tiếp HTTP/HTTPS.
+ Web Service cung cấp 1 chuẩn giao tiếp chung giữa các nền tảng, framework, ứng dụng…
+ Khi sử dụng web service ta chỉ quan tâm đầu vào là gì và đầu ra là gì mà không cần quan tâm tới hệ điều hành, ngôn ngữ lập trình… của ứng dụng gửi yêu cầu là gì.

2. Ưu điểm
+ Web service cung cấp nền tảng rộng lớn chạy được trên các hệ điều hành khác nhau
+ Năng cao khả năng tái sử dụng
+ Tạo mối quan hệ tương tác lẫn nhau, dễ dàng cho việc phát triển các ứng dụng phân tán.
+ Thúc đẩy mạnh mẽ vào hệ thống tích hợp và giảm được sự phức tạp của hệ thống, giảm giá thành phần tương tác tốt với hệ thống doanh nghiệp.
+ Sử dụng các giao thức và chuẩn mở, giao thức và định dạng dữ liệu dựa trên văn bản giúp các lập trình viên dễ dàng hiểu được

3. Nhược điểm
+ Có nhiều chuẩn khiến người dùng khó nắm bắt.
+ Có thể xảy ra thiệt hại lớn vào khoảng thời gian không hoạt động của web service như: có thể lỗi nếu như máy tính không nâng cấp, thiếu các giao tiếp trong việc vận hành.
+ Phải quan tâm nhiều hơn đến vẫn đề bảo mật

4. So sánh giữa SOAP và REST

|  #  |  SOAP | REST  |
|----|---|---|
|  1  | Object Access Protocol  | REpresentational State Transfer |
|  2  | SOAP là một giao thức  |  REST là một cách thiết kế kiến trúc |
|  3  |  SOAP không thể sử dụng REST vì nó là một giao thức |  REST có thể dùng các web services sử dụng SOAP vì nó có thể dùng bất kỳ giao thức nào như HTTP, SOAP |
|  4  |  SOAP định nghĩa các chuẩn và quy tắc chặt chẽ |  REST không định nghĩa nhiều chuẩn như SOAP |
|  5  |  SOAP sử dụng băng thông và tài nguyên nhiều hơn REST |  REST sử dụng băng thông và tài nguyên ít hơn SOAP |
|  6  | SOAP chỉ hỗ trợ định dạng dữ liệu XML | REST hỗ trợ các định dạng dữ liệu khác nhau như text, HTML, XML, JSON  |
|  7  |  Hỗ trợ hầu hết các chuẩn bảo mật, tin cậy và giao dịch | Sử dụng tốt với các giao thức như: HTTP, SSL. Các phương thức DELETE và PUT thường bị vô hiệu hóa bởi tường lửa hoặc vấn đề bảo mật  |
|  8  |  SOAP hỗ trợ cả hai giao thức SMTP và HTTP | REST gắn với giao thức HTTP  |

Sự khác nhau cơ bản giữa SOAP và RESTful là
+ SOAP chỉ trả về dữ liệu dạng XML còn RESful trả về dữ liệu ở nhiều định dạng khác nhau: Plain Text, HTML, XML and JSON…
+ Tốc độ của RESTFul nhanh hơn SOAP
+ SOAP có tính bảo mật và toàn vẹn hơn RESTful
+ SOAP là một kiểu giao thức (protocol) na ná như HTTP, nó cũng có phần header, body… để định nghĩa dữ liệu gửi về còn RESTFul giống như 1 kiểu kiến trúc gửi/ nhận (client gửi request/dữ liệu tới, server trả dữ liệu tương ứng về)
