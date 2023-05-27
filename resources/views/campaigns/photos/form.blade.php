<section id="section-form" class="section-form">
    <div class="image-form">
        <div class="container">
            <div class="form-title">
                <h3>Thông tin</h3>
                <h4>ĐĂNG KÝ THAM GIA</h4>
            </div>

            <div class="form-inputs">

                <form class="group-form-input" id="group-form-input">

                    <div class="title-form-file">
                        <p>Đăng tải ảnh dự thi</p>
                    </div>

                    <div class="form-file-image">
                        <div class="image-upload-wrap">
                            <input class="file-upload-input" id="upload-img" type='file' onchange="readURL(this);"
                                   accept="image/jpeg,image/gif,image/png"></input>
                            <div class="drag-text">
                                <div class="image-upload">
                                    <img src="{{asset('assets/images/group212.png')}}" alt="img-upload">
                                </div>
                                <h3>Nhấn vào đây để tải lên hình của bạn</h3>
                                <p>Supports: 'JPG, JPEG2000, PNG'</p>
                                <small id="error-upload"></small>
                            </div>

                        </div>

                        <div class="file-upload-content">
                            <img class="file-upload-image" src="#" alt="your image"/>
                            <div class="image-title-wrap">
                                <button type="button" onclick="removeUpload()" id="remove-image" class="remove-image">
                                    Remove <span
                                        class="image-title">Uploaded Image</span></button>
                            </div>
                        </div>
                    </div>

                    <div class="title-form-input">
                        <p>Vui lòng điền đầy đủ thông tin dưới đây</p>
                    </div>

                    <div class="form-control">
                        <label class="label-left" for="">Họ Tên <span class="error-lable">*</span></label>

                        <div class="form-input">
                            <input class="label-right" type="text" id="name" placeholder="Tên">
                        </div>
                        <small class="error-mes"></small>
                    </div>

                    <div class="form-control">
                        <label class="label-left" for="">Tên hiển thị <span class="error-lable">*</span></label>

                        <div class="form-input">
                            <input class="label-right" type="text" id="username" placeholder="Tên tài khoản">
                        </div>
                        <small class="error-mes"></small>
                    </div>

                    <div class="form-control">
                        <label class="label-left" for="">Số điện thoại <span class="error-lable">*</span></label>

                        <div class="form-input">
                            <input class="label-right" type="text" id="phone" placeholder="Số điện thoại" maxlength="10">
                        </div>
                        <small class="error-mes"></small>
                    </div>
                    <div class="form-control">
                        <label class="label-left" for="">Email <span class="error-lable">*</span></label>

                        <div class="form-input">
                            <input class="label-right" type="email" id="email" placeholder="Mỗi email chỉ đăng ký dự thi 1 lần">
                        </div>
                        <small class="error-mes"></small>
                    </div>

                    <div class="form-control">
                        <label class="label-left" for="">SNS URL</label>

                        <div class="form-input">
                            <input class="label-right sns" placeholder="SNS URL 1" type="text">
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label-left" for=""></label>

                        <div class="form-input">
                            <input class="label-right sns" placeholder="SNS URL 2" type="text">
                        </div>
                    </div>

                    <div class="form-control">
                        <label class="label-textarea" for="">Mô tả ảnh <span class="error-lable">*</span></label>

                        <div class="form-input">
                            <textarea name="" id="desc" class="textarea" cols="20" maxlength="200" rows="4"
                                      placeholder="Mô tả ảnh của bạn tại đây (tối đa 200 ký tự)"></textarea>

                            <span id="word-number">0/200</span>
                        </div>
                        <small class="error-mes"></small>
                    </div>

                    <div class="form-check">
                        <div>
                            <div class="info-check">
                                <img src="{{asset('assets/images/group502.png')}}">
                                <div class="check-group">
                                    <p><span class="error">*</span> Là những thông tin bắt buộc</p>
                                </div>
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" id="checked" onclick="goFurther()">
                                <label for="checked" class="form-checked">
                                    Tôi đã đọc và đồng ý với điều khoản quy định
                                    <a href="#" id="openPopup">term & conditions</a>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div id="popup1" class="overlay">
                        <div class="popup">
                            <a id="closePopup">&times;</a>
                            <div class="content">
                                <ul>
                                    <li>THỂ LỆ CUỘC THI ẢNH</li>
                                    <li>- Người tham gia phải tuân thủ các quy định của cuộc thi. Bắt đầu từ thời điểm nộp đơn đăng kí, người tham gia được coi là đã đồng ý tuân thủ các quy định của cuộc thi.</li>
                                    <li>- Trong trường hợp người tham gia dự thi là trẻ vị thành niên, cần có sự đồng ý của cha mẹ hoặc người giám hộ.</li>
                                    <li>- Ảnh do người khác chụp và ảnh có nội dung thuộc bản quyền của cá nhân, cơ quan khác, bao gồm tên công ty / tên sản phẩm, ảnh chân dung của người không đăng kí dự thi... sẽ không được tham gia nếu không được sự cho phép của cơ quan/cá nhân sở hữu.</li>
                                    <li>- JNTO không chịu bất cứ trách nhiệm nào nếu phát sinh khiếu nại từ bên thứ ba về quyền tác giả, quyền ảnh chân dung hoặc bất kỳ quyền nào khác liên quan đến tác phẩm dự thi. Người tham gia phải hoàn toàn chịu trách nhiệm và giải quyết các khiếu nại liên quan.</li>
                                    <li>- Nếu JNTO xét thấy bài dự thi có rủi ro vi phạm những điều khoản dưới đây thì bài dự thi sẽ bị hủy bỏ và gỡ xuống mà không cần thông báo trước cho người tham gia.</li>
                                    <li>- Bất kỳ hành vi nào vi phạm bản quyền hoặc các quyền sở hữu trí tuệ khác của bên thứ ba và JNTO.</li>
                                    <li>- Bài dự thi có hành vi nói xấu, bôi nhọ bên thứ ba và JNTO.</li>
                                    <li>- Bài dự thi có nội dung trái với thuần phong mỹ tục, gây ảnh hưởng đến trật tự xã hội hay hành vi công khai nội dung thông tin, tài liệu.</li>
                                    <li>- Các hành vi xâm phạm tài sản hoặc quyền riêng tư của bên thứ ba và JNTO.</li>
                                    <li>- Các hành vi có mục đích quảng cáo, tuyên truyền cho các sản phẩm hoặc dịch vụ.</li>
                                    <li>- Các hành vi vi phạm pháp luật.</li>
                                    <li>- Các hành vi khác không phù hợp với mục đích của cuộc thi.</li>
                                    <li>- JNTO hoặc bên thứ ba được chỉ định có thể sử dụng miễn phí, đăng tải công khai các tác phẩm dự thi cho các mục đích quảng bá về du lịch Nhật Bản trên các website hoặc phương tiện truyền thông mà không cần thông báo với cá nhân đăng kí dự thi.</li>
                                    <li>- JNTO có thể sử dụng miễn phí các tác phẩm dự thi cho việc sản xuất lịch do văn phòng phát hành.</li>
                                    <li>- Xin lưu ý rằng nội dung và các điều khoản, quy định của cuộc thi có thể được thay đổi hoặc hủy bỏ mà không cần thông báo trước.</li>
                                    <br>
                                    <li><b>Quy trình quyết định và công bố giải thưởng</b></li>
                                    <li>・JNTO lựa chọn và chấm điểm những tác phẩm xuất sắc nhất.</li>
                                    <li>・Thông báo về các tác phẩm đoạt giải sẽ được đăng tải trên website và Facebook “Cảm nhận Nhật Bản” của JNTO vào ngày 30 tháng 7 năm 2021 (Thứ Sáu).</li>
                                    <li>・Ban tổ chức sẽ liên hệ với những người thắng giải sau khi công bố kết quả. Trường hợp ban tổ chức không thể liên lạc để thông báo giải thưởng trong vòng 1 tuần, người đoạt giải sẽ mất quyền nhận giải thưởng.</li>
                                    <li>・Tên của những người có tác phẩm đoạt giải có thể được giới thiệu trên website chính thức của cuộc thi và trên trang Facebook “Cảm nhận Nhật Bản”. Ngoài ra, JNTO có thể sử dụng, trích dẫn các hình ảnh, nội dung tác phẩm cho các dự án khác do JNTO thực hiện.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <button class="disabled-emtry" type="submit" id="btnSubmit" disabled>
                        <div class="btn-shadow" disabled></div>
                        ĐĂNG KÝ
                    </button>

                </form>
            </div>
            <a class="advertise-photo" href="https://www.japan.travel/vi/vn/nhatbantoiyeu/movie">
                <img src="{{asset('assets/images/group6.png')}}" alt="advertise-movie">
            </a>
        </div>
    </div>
</section>
