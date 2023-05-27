@extends('campaigns.layouts.layout')

{{--Title--}}
@section('title',trans('seo.general_title'))

{{--Main--}}
@section('main')

    <!-- Back to top button -->
    <div id="button">
      <div class="button-top"></div>
      <p>Đầu Trang</p>
    </div>

    <!-- Section Banner -->
    @include('campaigns.components.banner')

    <!-- Section Button Action -->
    <section id="section-action" class="section-action">
        <div class="container">
            <div class="group-action">
                <button class="btn-info btn-action" id="btn-info__photo">
                    THÔNG TIN CHI TIẾT
                </button>
                <button class="btn-register btn-action" id="btn-register__photo">
                    ĐĂNG KÝ NGAY
                </button>
            </div>
        </div>
    </section>

    <!-- Section Info Area -->
    <section id="section-info-area" class="section-info-area">

        <div class="container">
            <div class="group-text">
                <h4>CUỘC THI ẢNH NHẬT BẢN TÔI YÊU</h4>

                <div class="test-img">
                    <ul class="text-first">
                      <li>Cơ quan xúc tiến du lịch Nhật Bản (JNTO) tại Việt Nam tổ chức cuộc thi ảnh với chủ đề “Nhật Bản tôi yêu”. Cuộc thi ảnh dành cho các bạn đã đến Nhật Bản chia sẻ những khoảnh khắc đẹp trong chuyến đi của mình. Trong số những tác phẩm dự thi ban tổ chức sẽ chọn ra những bức ảnh xuất sắc nhất để trao tặng những giải thưởng hấp dẫn.</li>
                    </ul>

                    <div class="image-tree">
                        <img src="{{asset('assets/images/tree.png')}}" alt="tree">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Section Photo -->
    @include('campaigns.photos.list')

    <div class="cloud-img">
    <!-- Section Souvenir -->
    @include('campaigns.photos.souvenir')

    <!-- Section Rules + Award -->
    <section id="section-rules" class="section-rules">
        <div class="image-rules">
            <div class="container">
                <h3>Tổng quan</h3>
                <div class="group-rules">
                    <div class="text-rule">
                        <h4>CUỘC THI ẢNH NHẬT BẢN TÔI YÊU</h4>
                        <ul class="rules-ul">
                            <li class="rules-table">
                                <p class="rule-left">Chủ đề</p>
                                <span class="rule-right">Nhật Bản tôi yêu</span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Thời gian đăng ký</p>
                                <span class="rule-right text-red">05/05/2021 (Thứ Tư) – 05/07/2021 (Thứ Hai)</span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Công bố giải thưởng</p>
                                <span class="rule-right text-red">30/07/2021 (Thứ Sáu)</span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Trao giải</p>
                                <span class="rule-right text-red">25/10/2021 (Thứ Hai)</span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Điều kiện tham gia</p>
                                <span class="rule-right">Đang sinh sống ở Việt Nam. Không giới hạn trình độ, giới tính, độ tuổi hay
                                quốc tịch. Dự thi bằng những bức ảnh tự chụp của chuyến đi Nhật Bản trong quá khứ. Mỗi email chỉ đăng ký dự thi 1 lần.</span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Phương thức đăng ký</p>
                                <span class="rule-right">Sau khi đồng ý với các quy định của cuộc thi, bạn hãy điền đầy đủ thông tin
                                trên website và đăng ảnh
                                dự thi để hoàn tất đăng ký.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="image-rule">
                        <div class="image-rule-top">
                            <img src="{{asset('assets/images/group1.jpg')}}" alt="natural">
                        </div>
                        <div class="image-rule-bottom">
                            <img src="{{asset('assets/images/group2.jpg')}}" alt="bagoda">
                        </div>
                    </div>

                </div>

                <div class="prizes">
                    <div class="group-roll">
                      <img class="prize" src="{{asset('assets/images/group37.png')}}" alt="prize">
                      <p>Giải Thưởng</p>
                    </div>
                    <div class="first-prize">
                      <div class="first-prize-img">
                        <div class="box-image">
                            <img src="{{asset('assets/images/group36.png')}}" alt="camera-prize">
                        </div>
                      </div>
                      <div class="first-prize-text">
                        <h3>01</h3>
                        <div class="text-first">
                          <h4>Giải nhất</h4>
                          <h5>Máy ảnh Canon <br> EOS 850D EF-S18-55mm</h5>
                        </div>
                      </div>
                    </div>

                    <div class="second-thirt-prize">
                      <div class="second-prize prizes-box">
                        <div class="second-prize-img prizes-images">
                          <div class="box-image">
                            <img src="{{asset('assets/images/group4.png')}}" alt="camera-mini-prize">
                          </div>
                        </div>

                        <div class="second-prize-text prizes-text">
                          <div class="text-second prizes-text-info">
                            <h3>10</h3>
                            <div class="title-prizes">
                                <h4>Giải nhì</h4>
                                <h5>Máy in ảnh Canon <br> SELPHY SQUARE QX10</h5>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="thirt-prize prizes-box">
                        <div class="thirt-prize-img prizes-images">
                          <img src="{{asset('assets/images/group3.png')}}" alt="loa-prize">
                        </div>

                        <div class="thirt-prize-text prizes-text">
                          <div class="text-thirt prizes-text-info">
                            <h3>30</h3>
                            <div class="title-prizes">
                                <h4>Giải ba</h4>
                                <h5>Loa JBL GO3</h5>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="advertise-form">
                        <div class="box-advertise">
                            <div class="advertise-image">
                                <img src="{{asset('assets/images/group387.png')}}" alt="vali-660">
                            </div>
                            <div class="advertise-text">
                                <p>Đặc biệt, <span class="red-text">660</span> bạn may mắn có bài tham gia cuộc thi hợp lệ, sẽ nhận được một <span class="red-text">TÚI KÉO DU LỊCH</span></p>
                                <small>* Giải thưởng này chỉ áp dụng cho các bạn chưa đoạt giải Nhất, Nhì, Ba</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Section Form -->
    @include('campaigns.photos.form')
@endsection

{{--Script--}}
@section('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

//     <script>
//         /*Global Variables*/
//         const currentType = `{{$type ?: ''}}`;
//         const currentRoute = `{{ route('photo') }}`;
//         const sharingRoutePC = `{{ route('share') }}`;
//         const sharingRouteMobile = `{{ route('share.redirect',['type' => $type ?: '']) }}`;
//         const facebookAppId = `{{ config('facebook.app_id') }}`;
//     </script>
//     <!--Facebook-Sharing-->
//     <script src="{{ asset(mix('assets/js/plugins/facebook/sharing.js')) }}"></script>
//     <!--Module Photo-->
    <script>

        $(document).ready(function () {
            $('[data-fancybox]').fancybox({
                clickOutside: "close",
                buttons : [
                    'close'
                ]
            });
            ///////////////////////////////////////////////
            // Slick Banner
            $(".banner-slider").slick({
                infinite: true,
                autoplay: true,
                autoplaySpeed: 5000,
                fade: true,
                prevArrow: false,
                nextArrow: false,
                pauseOnHover: false,
                pauseOnFocus: false,
                dots: true,
                adaptiveHeight: true
            });

            ////////////////////////////////////////////
            // Slick Photo
            $(".photo-slider").slick({
                dots: true,
                infinite: true,
                fade: true,
                adaptiveHeight: true,
                useTransform: true,
                autoplay: true,
                autoplaySpeed: 5000
            });

            ////////////////////////////////
            // MAx length
            $(".textarea").bind('input propertychange', function() {
                oldDesc = this.value

                if (this.value.length <= 200) {
                    $("#word-number").text($(this).val().length + "/200");
                }

                this.value = this.value.substring(0, 200);
            })

            ////////////////////////////
            //VALIDATE
            let name = document.getElementById("name");
            let username = document.getElementById("username");
            let phone = document.getElementById("phone");
            let email = document.getElementById("email");
            let desc = document.getElementById("desc");
            let upload = document.getElementById("upload-img");
            let sns = document.getElementsByClassName("sns");
            let term = document.getElementById("checked");


            {{--$('#btnSubmit').on('click', async (e) => {--}}
            {{--    e.preventDefault();--}}
            {{--    goFurther();--}}
            {{--    var sweet_loader = '<div class="loader"></div>';--}}
            {{--    if (checkInputs() && term.value){--}}
            {{--      $('#btnSubmit').prop('disabled', true);--}}
            {{--      let formData = new FormData();--}}

            {{--      formData.append("file", upload.files[0])--}}
            {{--      formData.append("name" , name.value);--}}
            {{--      formData.append("display_name" , username.value);--}}
            {{--      formData.append("phone_number" ,  phone.value);--}}
            {{--      formData.append("email" , email.value);--}}
            {{--      formData.append("description" , desc.value);--}}
            {{--      formData.append("sns_url[0]" , sns[0].value);--}}
            {{--      formData.append("sns_url[1]" , sns[1].value);--}}
            {{--      formData.append("term" , term.checked);--}}

            {{--      try {--}}
            {{--        await $.ajax({--}}
            {{--          method: 'POST',--}}
            {{--          url: `{{ route('photos.create')}}`,--}}
            {{--          processData: false,--}}
            {{--          contentType: false,--}}
            {{--          data: formData,--}}
            {{--          beforeSend: function() {--}}
            {{--            swal.fire({--}}
            {{--                html: '<h5>Loading...</h5>',--}}
            {{--                showConfirmButton: false,--}}
            {{--                onRender: function() {--}}
            {{--                     $('.swal2-content').prepend(sweet_loader);--}}
            {{--                }--}}
            {{--            });--}}
            {{--          }--}}
            {{--        }).done((res) => {--}}
            {{--          Swal.fire('Cảm ơn bạn', 'Bài viết đã gửi thành công và trong quá trình xét duyệt!', 'success')--}}
            {{--          .then(_ => {--}}
            {{--            $("html, body").animate({ scrollTop: 0 }, 1500);--}}
            {{--            $(".form-checked")[0].style.color = "black";--}}
            {{--          });--}}
            {{--          resetForm();--}}
            {{--        }).fail((err) => {--}}
            {{--          if (err.responseJSON.code === 400){--}}
            {{--            err.responseJSON.errors.forEach(error => {--}}
            {{--              if (error.field === 'email'){--}}
            {{--                setErrorFor(email, error.message[0]);--}}
            {{--              }--}}
            {{--            })--}}
            {{--            Swal.close();--}}
            {{--          }else {--}}
            {{--            Swal.fire('Thật xin lỗi', 'Máy chủ đang bận, vui lòng thử lại sau!', 'error');--}}
            {{--          }--}}
            {{--        })--}}
            {{--      }catch (e) {--}}
            {{--        $("#btnSubmit").addClass('success-emtry');--}}
            {{--        $("#btnSubmit").prop( "disabled", false );--}}
            {{--      }--}}
            {{--    }--}}
            {{--});--}}

            function resetForm () {
              removeUpload();
              name.value = email.value = username.value = phone.value = desc.value = sns[0].value = sns[1].value = '';
              $('.form-control').removeClass('success');
              term.checked = false;
              goFurther();
            }

            function checkInputs() {
                let flagSuccess = true;

                const nameValue = name.value.trim();
                const usernameValue = username.value.trim();
                const phoneValue = phone.value;
                const emailValue = email.value.trim();
                const descValue = desc.value.trim();
                const uploadValue = upload.value;

                // File
                if (uploadValue === "") {
                    flagSuccess = false;
                    setErrorUpload(upload, "* Ảnh không được để trống!");
                }

                // Name
                if (nameValue === "") {
                    flagSuccess = false;
                    setErrorFor(name, "* Họ tên không được để trống!");
                } else {
                    setSuccessFor(name);
                }

                // Display name
                if (usernameValue === "") {
                    flagSuccess = false;
                    setErrorFor(username, "* Tên hiển thị không được để trống!");
                } else {
                    setSuccessFor(username);
                }

                // Phone number
                if (phoneValue === "") {
                    flagSuccess = false;
                    setErrorFor(phone, "* Số điện thoại không được để trống!");
                } else {
                    setSuccessFor(phone);
                }

                // Email
                if (emailValue === "") {
                    flagSuccess = false;
                    setErrorFor(email, "* Email không được để trống!");
                } else if (!isEmail(emailValue)) {
                    flagSuccess = false;
                    setErrorFor(email, "* Email không đúng định dạng!");
                } else {
                    setSuccessFor(email);
                }

                // Description
                if (descValue === "") {
                    flagSuccess = false;
                    setErrorFor(desc, "* Mô tả không được để trống!");
                } else {
                    setSuccessFor(desc);
                }

                return flagSuccess;
            }

            function setErrorFor(input, message) {
                const formControl = input.parentElement.parentElement;
                const small = formControl.querySelector("small");
                small.innerText = message;
                formControl.className = "form-control error";
            }

            function setSuccessFor(input) {
                const formControl = input.parentElement.parentElement;
                const small = formControl.querySelector("small");
                small.innerText = "";
                formControl.className = "form-control success";
            }

            function setErrorUpload(input, message) {
                const formControl = input.parentElement;
                const small = formControl.querySelector("#error-upload");
                small.innerText = message;
                document.getElementsByClassName("image-upload-wrap")[0].style.border =
                    "1px solid red";
            }

            // Validate phone number
            document.getElementById('phone').addEventListener('input', function(e) {
              this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
            })

            // Validate email
            function isEmail(email) {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            /////////////////////////////////////////////
            // Scroll to page
            $("#btn-register__photo").click(function () {
                $("html,body").animate(
                    {
                        scrollTop: $("#section-form .container").offset().top,
                    },
                    1000
                );
            });

            $("#btn-info__photo").click(function () {
                $("html,body").animate(
                    {
                        scrollTop: $("#section-rules .container").offset().top,
                    },
                    1000
                );
            });

            ////////////////////////////////////
            // Back To Top (Photo)
            var btn = $("#button");
            const headerHeight = document.getElementById("header").clientHeight;
            const sectionBannerHeight = document.getElementById("section-banner")
                .clientHeight;
            const sum = headerHeight + sectionBannerHeight;

            $(window).scroll(function () {
                if ($(window).scrollTop() > sum) {
                    btn.addClass("show");
                } else {
                    btn.removeClass("show");
                }
            });

            btn.on("click", function (e) {
                e.preventDefault();
                $("html, body").animate({ scrollTop: 0 }, 1500);
            });
        });

        ////////////////////////////////////
        //Validate Check (term & condition)
        // function goFurther() {
        //     if (document.getElementById("checked").checked) {
        //         document.getElementsByClassName("form-checked")[0].style.color = "black";
        //         document.getElementById("btnSubmit").disabled = false;
        //         document.getElementById("btnSubmit").className =
        //             "disabled-emtry success-emtry";
        //     } else {
        //         document.getElementsByClassName("form-checked")[0].style.color = "red";
        //         document.getElementById("btnSubmit").disabled = true;
        //         document.getElementById("btnSubmit").className = "disabled-emtry";
        //     }
        // }

        ///////////////////////////////////////////
        // File upload img
        function readURL(input) {
          if (input.files.length){
            // Empty Error mesage
            $('#error-upload').text('');
            document.getElementsByClassName("image-upload-wrap")[0].style.border = "3px dashed #ed586e";

            var selectedFile = input.files[0];
            var idxDot = selectedFile.name.lastIndexOf(".") + 1;

            var extFile = selectedFile.name
                                       .substr(idxDot, selectedFile.name.length)
                                       .toLowerCase();

            if ((
              extFile == "jpg" ||
              extFile == "jpeg" ||
              extFile == "png" ) && selectedFile.size <= 20971520
            ) {
              var reader = new FileReader();

              reader.onload = function (e) {
                $(".image-upload-wrap").hide();

                $(".file-upload-image").attr("src", e.target.result);
                $(".file-upload-content").show();

                $(".image-title").html(input.files[0].name);
              };

              reader.readAsDataURL(input.files[0]);
            } else {
              $('#error-upload').text('* Ảnh phải đúng định dạng (PNG, JPG, JPEG) và dưới 20MB!');
              document.getElementsByClassName("image-upload-wrap")[0].style.border =
                "2px solid red";
            }
          }
        }

        ////////////////////////////////////////////
        // Remove img upload
        function removeUpload() {
            $('.file-upload-input').val('');
            $(".file-upload-content").hide();
            $(".image-upload-wrap").show();
        }
        $(".image-upload-wrap").bind("dragover", function () {
            $(".image-upload-wrap").addClass("image-dropping");
        });
        $(".image-upload-wrap").bind("dragleave", function () {
            $(".image-upload-wrap").removeClass("image-dropping");
        });



        /////////////////////////////////////////////
        // Handle Popup
        document.getElementById('openPopup').addEventListener('click', function(e) {
            e.preventDefault();
            var popup = document.getElementById('popup1');
            $('body').addClass("inScroll");
            popup.classList.toggle('show');
        })

        document.getElementById('closePopup').addEventListener('click', function(e) {
            e.preventDefault();
            var popup = document.getElementById('popup1');
            $('body').removeClass("inScroll");
            popup.classList.remove('show');
        })



        /*ON LOAD EVENT*/
        window.onload = function() {

            var photo = `{!! $photo !!}` ?  JSON.parse(`{!! $photo !!}`) : '';

            if(photo && typeof photo !== undefined) {
                for (let file of photo.files){
                  if (file.file_type === 'main'){
                    var img = file.url;
                  }
                }
                var userName = photo.user.name;
                var description = photo.description;

                var $modal = $(".modal");
                $modal.find('.modal-heading').text(userName);
                $modal.find('.modal-img img').attr('src', img);
                $modal.find('.modal-content p').text(description);

            $modal.toggleClass("is-visible");

          }

          if(`{!! Session::has('status') !!}`){
            switch (`{!! Session::get('status') !!}`) {
              case 'error':
                Swal.fire('Thật xin lỗi', 'Máy chủ đang bận, vui lòng thử lại sau!', 'error');
                break;
              case 'warning':
                Swal.fire('Thật xin lỗi', 'Bạn đã chia sẻ bài viết này!', 'warning');
                break;
              case 'success':
                let currentUrl = new URL(window.location.href);
                let currentUrlParams = new URLSearchParams(currentUrl.search);
                let userId = `{!! Session::get('user_id') !!}`;
                let type = `{!! Session::get('type') !!}`;
                let campaignId = `{!! Session::get('campaign_id') !!}`;
                if (!currentUrlParams.has('error_code')){
                  Swal.fire('Cảm ơn bạn', 'Bài viết đã được chia sẻ thành công!', 'success')
                  $.ajax({
                    method: 'POST',
//                     url: sharingRoutePC,
                    data: {
                      user_id: userId,
                      type: type,
                      campaign_id: campaignId,
                    }
                  })
                }
                break;
              default:
                  break;
            }
          }
        }
    </script>
@endsection
