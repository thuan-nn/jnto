@extends('campaigns.layouts.layout')

{{--Title--}}
@section('title','Cuộc thi viết "Nhật Bản tôi yêu"')

{{--Main--}}
@section('main')

    <!-- Back to top button -->
    <div id="button__story">
        <div class="button-top__story"></div>
        <p>Đầu Trang</p>
    </div>

    <!-- Section Banner -->
    @include('campaigns.components.banner')

    <!-- Section Button Action -->
    <section id="section-action__story" class="section-action__story">
        <div class="container">
            <div class="group-action">
                <button class="btn-info btn-action" id="btn-info__story">
                    THÔNG TIN CHI TIẾT
                </button>
                <button class="btn-register btn-action" id="btn-register__story">
                    ĐĂNG KÝ NGAY
                </button>
            </div>
        </div>
    </section>

    <!-- Section Info Area -->
    <section id="section-info-area__story" class="section-info-area__story">

        <div class="container">
            <div class="group-text">
                <h4>CUỘC THI VIẾT NHẬT BẢN TÔI YÊU</h4>

                <div class="test-img">
                    <ul class="text-first">
                      <li>Cơ quan xúc tiến du lịch Nhật Bản (JNTO) tại Việt Nam tổ chức cuộc thi viết với chủ đề “Nhật Bản tôi yêu”. Cuộc thi viết là cơ hội để bạn chia sẻ những kỷ niệm về chuyến đi đáng nhớ của mình tại Nhật Bản; những kế hoạch du lịch Nhật Bản trong tương lai hay ước mơ đặt chân đến xứ sở mặt trời mọc. Trong số những tác phẩm dự thi ban tổ chức sẽ chọn ra những bài viết xuất sắc nhất để trao tặng những giải thưởng hấp dẫn.</li>
                    </ul>

                    <div class="image-tree">
                        <img src="{{asset('assets/images/tree.png')}}" alt="tree">
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Section Photo -->
    @include('campaigns.stories.list')

    <!-- Section Rules + Award -->
    <section id="section-rules__story" class="section-rules__story">
        <div class="image-rules">
            <div class="container">
                <h3>Tổng quan</h3>
                <div class="group-rules">
                    <div class="text-rule">
                        <h4>CUỘC THI VIẾT NHẬT BẢN TÔI YÊU</h4>
                        <ul class="rules-ul">
                            <li class="rules-table">
                                <p class="rule-left">Chủ đề</p>
                                <span class="rule-right">Nhật Bản tôi yêu</span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Thời gian đăng ký</p>
                                <span class="rule-right"><i>05/07/2021 (Thứ Hai) - 06/09/2021 (Thứ Hai)</i></span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Công bố giải thưởng</p>
                                <span class="rule-right"><i>30/09/2021 (Thứ Năm)</i></span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Trao giải</p>
                                <span class="rule-right"><i>25/10/2021 (Thứ Hai)</i></span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Điều kiện tham gia</p>
                                <span class="rule-right">Đang sinh sống ở Việt Nam. Không giới hạn trình độ, giới tính, độ tuổi hay quốc tịch. Bài dự thi chỉ được viết bằng tiếng Việt, giới hạn trong 1500 chữ. Nội dung chia sẻ về chuyến đi Nhật Bản trong quá khứ hoặc ước mơ, kế hoạch đến Nhật Bản trong tương lai. Mỗi email chỉ đăng ký dự thi 1 lần.</span>
                            </li>
                            <li class="rules-table">
                                <p class="rule-left">Phương thức đăng ký</p>
                                <span class="rule-right">Sau khi đồng ý với các quy định của cuộc thi, bạn hãy điền đầy đủ thông tin trên website và gửi bài dự thi để hoàn tất đăng ký.</span>
                            </li>
                        </ul>
                    </div>

                    <div class="image-rule">
                        <div class="image-rule-top">
                            <img src="{{asset("assets/images/group30.jpg")}}" alt="img-book">
                        </div>
                        <div class="image-rule-bottom">
                            <img src="{{asset("assets/images/group32.jpeg")}}" alt="img-women">
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
                            <img src="{{asset('assets/images/group5.png')}}" alt="camera-prize">
                        </div>
                      </div>
                      <div class="first-prize-text">
                        <h3>01</h3>
                        <div class="text-first">
                          <h4>Giải nhất</h4>
                          <h5>Máy ảnh Canon<br> EOS M200 EF-M 15-45mm f/3.5-6.3 IS STM & EF-M 22mm f/2 STM<br> (Bao gồm 1 thân máy và 2 ống kính chụp ảnh)</h5>
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
                </div>
            </div>
        </div>
    </section>

    <!-- Section Form -->
    @include('campaigns.stories.form')
@endsection

{{--Script--}}
@section('script')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <!--Module Story-->
    <script>
        $(document).ready(function () {
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
                if (this.value.length <= 1500) {
                    $("#word-number").text($(this).val().length + "/1500");
                }

                this.value = this.value.substring(0, 1500);
            })

            ////////////////////////////
            //VALIDATE
            let name = document.getElementById("name");
            let username = document.getElementById("username");
            let phone = document.getElementById("phone");
            let email = document.getElementById("email");
            let desc = document.getElementById("desc");
            let sns = document.getElementsByClassName("sns");
            let term = document.getElementById("checked");
            let title = document.getElementById('title');

//             $('#btnSubmit').on('click', async (e) => {
//                 e.preventDefault();
//                 goFurther();
//                 var sweet_loader = '<div class="loader-story"></div>';
//
//                 if (checkInputs() && term.value){
//                   $('#btnSubmit').prop('disabled', true);
//                   let formData = new FormData();
//
//                   formData.append("name" , name.value);
//                   formData.append("display_name" , username.value);
//                   formData.append("phone_number" ,  phone.value);
//                   formData.append("email" , email.value);
//                   formData.append("content" , desc.value);
//                   formData.append("sns_url[0]" , sns[0].value);
//                   formData.append("sns_url[1]" , sns[1].value);
//                   formData.append("term" , term.checked);
//                   formData.append('title', title.value);
//
//                   try {
//                     await $.ajax({
//                       method: 'POST',
//                       url: `{{ route('stories.create')}}`,
//                       processData: false,
//                       contentType: false,
//                       data: formData,
//                       beforeSend: function() {
//                           swal.fire({
//                               html: '<h5>Loading...</h5>',
//                               showConfirmButton: false,
//                               onRender: function() {
//                                    $('.swal2-content').prepend(sweet_loader);
//                               }
//                           });
//                         }
//                     }).done((res) => {
//                       Swal.fire('Cảm ơn bạn', 'Bài viết đã gửi thành công và trong quá trình xét duyệt!', 'success')
//                       .then(_ => {
//                         $("html, body").animate({ scrollTop: 0 }, 1500);
//                         $(".form-checked")[0].style.color = "black";
//                       });
//                       resetForm();
//                     }).fail((err) => {
//                       if (err.responseJSON.code === 400){
//                         err.responseJSON.errors.forEach(error => {
//                           if (error.field === 'email'){
//                             setErrorFor(email, error.message[0]);
//                           }
//                         })
//                         Swal.close();
//                       }else {
//                         Swal.fire('Thật xin lỗi', 'Máy chủ đang bận, vui lòng thử lại sau!', 'error');
//                       }
//                     })
//                   }catch (e) {
//                     $("#btnSubmit").addClass('success-emtry');
//                     $("#btnSubmit").prop( "disabled", false );
//                   }
//                 }
//             });

            function resetForm () {
              name.value = email.value = username.value = phone.value = desc.value = sns[0].value = sns[1].value = title.value = '';
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
                const titleValue = title.value.trim();

                // Name
                if (nameValue === "") {
                  flagSuccess = false;
                  setErrorFor(name, "* Họ tên không được để trống!");
                } else {
                    setSuccessFor(name);
                }

                // Title
                if (titleValue === '') {
                    flagSuccess = false;
                    setErrorFor(title, '* Tiêu đề không được để trống!');
                } else {
                    setSuccessFor(title);
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
                  setErrorFor(desc, "* Nội dung không được để trống!");
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

            // Validate phone number
            document.getElementById('phone').addEventListener('input', function(e) {
              this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
            })

            function isEmail(email) {
                const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

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


            /////////////////////////////////////////////
            // Scroll to page
            $("#btn-register__story").click(function () {
                $("html,body").animate(
                    {
                        scrollTop: $("#section-form__story").offset().top,
                    },
                    1000
                );
            });

            $("#btn-info__story").click(function () {
                $("html,body").animate(
                    {
                        scrollTop: $("#section-rules__story").offset().top,
                    },
                    1000
                );
            });

            ////////////////////////////////////
            // Back To Top (Stories)
            var btn = $("#button__story");
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
//         function goFurther() {
//             if (document.getElementById("checked").checked) {
//                 document.getElementsByClassName("form-checked")[0].style.color = "black";
//                 document.getElementById("btnSubmit").disabled = false;
//                 document.getElementById("btnSubmit").className =
//                     "disabled-emtry success-emtry";
//             } else {
//                 document.getElementsByClassName("form-checked")[0].style.color = "red";
//                 document.getElementById("btnSubmit").disabled = true;
//                 document.getElementById("btnSubmit").className = "disabled-emtry";
//             }
//         }


    </script>
@endsection
