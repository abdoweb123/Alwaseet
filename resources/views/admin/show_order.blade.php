@extends('admin.layout')

@section('title')
    <x-pageTitle current="Home">
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('dash.home') }}
        </li>
        <li class="breadcrumb-item" aria-current="page">
            {{ __('dash.orders') }}
        </li>
    </x-pageTitle>
@endsection

@section('content')
    <div class=" mx-auto row">
        <i role="button" onclick="CreatePDFfromHTML()" class="fa-solid fa-print"></i>


        <div style="font-size: 20px; font-weight: bold;" class="card border border-3 px-1  content-to-download mx-auto col-12 col-md-8 direction text-capitalize">
            <div class="card-body ">
                <div class="row mb-5" style="font-weight: 500;color: #2c2c6f;">

                    <div style="color: #2c2c6f !important; text-wrap:balance;"
                        class="col-5 text-dark fs-3 text-bold direction text-center pt-4 ">خط الوسيط لتخليص المعاملات</div>
                    <div class="col-2 text-dark fs-5 text-center"><img src="{{ setting('logo') }}"
                            style="width: 100px;height: 100px;"></div>
                    <div style="color: #2c2c6f !important;text-wrap:balance;"
                        class="col-5 text-dark fs-3 text-bold text-center pt-4">
                        Al-Waseet line documents clearance</div>
                </div>
                <table class="table text-center table-bordered">
                    <tbody style="font-weight: 500;">
                        <tr>
                            <td class="text-dark fs-5  direction ">تاريخ الانشاء </td>
                            <td>{{ $order->created_at->format('Y/m/d H:i a') }}</td>
                            <td>created at</td>
                        </tr>
                        @if ($order->order_number)
                        <tr>
                            <td>رقم الفاتوره</td>
                            <td>{{ $order->order_number }}</td>
                            <td>order number</td>
                        </tr>
                        @endif
                        <tr>
                            <td>الاسم</td>
                            <td>{{ $order->name }}</td>
                            <td>@Name</td>
                        </tr>
                        @if ($order->user?->cpr)
                        <tr>
                            <td> رقم الهوية </td>
                            <td>{{ $order->user?->cpr }}</td>
                            <td>CPR-CR</td>
                        </tr>
                        @endif
                        <tr>
                            <td>الهاتف </td>
                            <td>{{ $order->phone }}</td>
                            <td>phone</td>
                        </tr>
                        <tr>
                            <td>الخدمة </td>
                            <td>{{ $order->service['title_' . lang()] }}</td>
                            <td>Service</td>
                        </tr>
                        <tr>
                            <td>السعر</td>
                            <td>{{ $order->price }}</td>
                            <td>Price</td>
                        </tr>
                        @if ($order->bla_name)
                        <tr>
                            <td>اسم صاحب المعاملة </td>
                            <td>{{ $order->bla_name }}</td>
                            <td>Transaction owner name</td>
                        </tr>
                        @endif
                        @if ($order->id_type)
                        <tr>
                            <td>نوع الهوية </td>
                            <td>{{ $order->id_type }}</td>
                            <td>ID Type</td>
                        </tr>
                        @endif
                        @if ($order->id_number)
                        <tr>
                            <td>رقم الهوية </td>
                            <td>{{ $order->id_number }}</td>
                            <td>ID No.</td>
                        </tr>
                        @endif
                        @if ($order->note)
                        <tr>
                            <td>ملاحظات</td>
                            <td>{{ $order->note }}</td>
                            <td>Notes</td>
                        </tr>
                        @endif
                        <tr>
                            <td>حالة الدفع </td>
                            <td> {{ $order->status == 0 ? __('dash.waiting') : __('dash.done') }}</td>
                            <td>Payment status</td>
                        </tr>
                        @if ($order->user?->email)
                        <tr>
                            <td>البريد الالكتروني</td>
                            <td>{{ $order->user?->email }}</td>
                            <td>Email</td>
                        </tr>
                        @endif
                        @if ($order->user?->phone)
                        <tr>
                            <td>رقم الهاتف </td>
                            <td>{{ $order->user?->phone }}</td>
                            <td>Phone</td>
                        </tr>
                        @endif
                        @if ($order->worker)
                            <tr>
                                <td colspan="3" class="text-center"><strong> بيانات العامل - Worker Data</strong></td>
                            </tr>
                            <tr>
                                <td>الاسم</td>
                                <td>{{ $order->worker->name }}</td>
                                <td>Name</td>
                            </tr>
                            <tr>
                                <td>الرقم الشخصى</td>
                                <td>{{ $order->worker->personal_number }}</td>
                                <td>Personal Number</td>
                            </tr>
                            <tr>
                                <td>رقم الجواز</td>
                                <td>{{ $order->worker->passport_number }}</td>
                                <td>Passport Number</td>
                            </tr>
                            <tr>
                                <td>الهاتف</td>
                                <td>{{ $order->worker->phone }}</td>
                                <td>Phone</td>
                            </tr>
                            <tr>
                                <td>البريد الالكتروني</td>
                                <td>{{ $order->worker->email }}</td>
                                <td>Email</td>
                            </tr>
                        @endif

                    </tbody>
                </table>

            </div>
            <div class="card-footer text-muted fs-6">
                <div class="row">
                    <div class="col d-flex justify-content-center flex-column align-items-center">
                        <span><i class="fa-solid fa-mobile text-dark px-2"></i></span>
                        <span>
                            <a class="text-muted text-decoration-none" href="tel:37900700">
                                37900700
                            </a>
                        </span>
                    </div>
                    <div class="col d-flex justify-content-center flex-column align-items-center">
                        <span><i class="fa-solid fa-globe text-dark px-2"></i></span>
                        <a class="text-muted text-decoration-none" href="https://alwaseet-line-bh.com/">
                           Alwaseet-line-bh
                        </a>
                    </div>

                    <div class="col d-flex justify-content-center flex-column align-items-center">
                        <span><i class="fa-solid fa-envelope text-dark px-2"></i>
                        </span>
                        <span>
                            <a class="text-muted text-decoration-none" href="mailto:wldc.2024bh@gmail.com">
                                wldc.2024bh@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <script>
        //Create PDf from HTML...
        function CreatePDFfromHTML() {
            var HTML_Width = $(".content-to-download").width();
            var HTML_Height = $(".content-to-download").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

            html2canvas($(".content-to-download")[0]).then(function(canvas) {
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width,
                    canvas_image_height);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(PDF_Width, PDF_Height);
                    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4),
                        canvas_image_width, canvas_image_height);
                }
                pdf.save("file.pdf");
                // $(".content-to-download").hide();
            });
        }
    </script>
@endsection
