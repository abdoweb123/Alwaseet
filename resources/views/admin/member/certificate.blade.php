@extends('admin.layout')

@section('title')
    <x-pageTitle current="Home">
        <li class="breadcrumb-item active" aria-current="page">
            {{ __('dash.home') }}
        </li>
        <li class="breadcrumb-item" aria-current="page">
            {{ __('dash.membership_certificate') }}
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
                    <div class="col-2 text-dark fs-5 text-center">
                        <img src="{{ setting('logo') }}" style="width: 100px;height: 100px;">
                        <h4>Membership Number</h4>
                    </div>
                    <div style="color: #2c2c6f !important;text-wrap:balance;"
                        class="col-5 text-dark fs-3 text-bold text-center pt-4">
                        Al-Waseet line documents clearance</div>
                </div>
                <table class="table text-center table-bordered">
                    <tbody style="font-weight: 500;">
                        <tr>
                            <td>الاسم</td>
                            <td>{{ $user->name }}</td>
                            <td>Name</td>
                        </tr>
                        <tr>
                            <td>الهاتف </td>
                            <td>{{ $user->phone }}</td>
                            <td>phone</td>
                        </tr>
                        <tr>
                            <td>البريد الإلكترونى</td>
                            <td>{{ $user->email }}</td>
                            <td>Email</td>
                        </tr>
                        <tr>
                            <td> رقم الهوية </td>
                            <td>{{ $user->cpr }}</td>
                            <td>CPR-CR</td>
                        </tr>
                        <tr>
                            <td>المحفظة</td>
                            <td>{{ $user->wallet }}</td>
                            <td>Wallet</td>
                        </tr>
                        <tr>
                            <td>عدد الأشهر</td>
                            <td>{{ $user->number_months }}</td>
                            <td>number of months</td>
                        </tr>
                        <tr>
                            <td>تاريخ انتهاء العضوية</td>
                            <td>{{ $user->end_memebership }}</td>
                            <td>End of membership </td>
                        </tr>
                        <tr>
                            <td>سعر الشهر</td>
                            <td>{{ $user->price_month }}</td>
                            <td>Price per month</td>
                        </tr>
                        <tr>
                            <td>سعر الشهر</td>
                            <td>{{ $user->price_month }}</td>
                            <td>Price per month</td>
                        </tr>
                        <tr>
                            <td>الإجمالى</td>
                            <td>{{ $user->total_price_month }}</td>
                            <td>Total</td>
                        </tr>

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
