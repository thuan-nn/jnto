<section id="section-form__story" class="section-form__story">
    <div class="image-form">
        <div class="container">
            <div class="form-title">
                <h3>Thông tin</h3>
                <h4>ĐĂNG KÝ THAM GIA</h4>
            </div>

            <div class="form-inputs">
                <form class="group-form-input" id="group-form-input">
                    <div class="form-file-image">
                        <div class="title-form-file">
                            <p>Bài viết dự thi</p>
                        </div>

                        <div class="form-control">
                            <div class="form-input">
                                <input name="title" id="title" class="input-title" cols="30" maxlength="60" rows="1"
                                          placeholder="Nhập tiêu đề bài viết tại đây (Tối đa 60 chữ)"></input>
                            </div>
                            <small class="error-mes-textarea"></small>
                        </div>

                        <div class="form-control">
                            <div class="form-input">
                                <textarea name="" id="desc" class="textarea" cols="30" maxlength="1500" rows="4"
                                          placeholder="Nhập nội dung bài viết của bạn tại đây (Tối đa 1500 chữ)"></textarea>

                                <span id="word-number">0/1500</span>
                            </div>
                            <small class="error-mes-textarea"></small>
                        </div>
                    </div>

                    <div class="title-form-input">
                        <p>Vui lòng điền đầy đủ thông tin dưới đây</p>
                    </div>

                    <div class="form-control">
                        <label class="label-left" for="">Họ Tên <span class="error-lable">*</span></label>

                        <div class="form-input">
                            <input class="label-right" type="text" id="name" placeholder="Họ và tên">

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
                            <input class="label-right" type="email" id="email" placeholder="Mỗi email chỉ được đăng ký 1 lần">
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

                    <div class="form-check">
                        <div>
                            <div class="info-check">
                                <img src="{{ asset('assets/images/group502.png') }}">
                                <p><span class="error">*</span> Là những thông tin bắt buộc</p>
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
                                    <li>THỂ LỆ CUỘC THI VIẾT</li>
                                    <li>- Người tham gia phải tuân thủ các quy định của cuộc thi. Bắt đầu từ thời điểm nộp đơn đăng ký, người tham gia được coi là đã đồng ý tuân thủ các quy định của cuộc thi.</li>
                                    <li>- Trong trường hợp người tham gia dự thi là trẻ vị thành niên, cần có sự đồng ý của cha mẹ hoặc người giám hộ.</li>
                                    <li>- Tác phẩm do người khác viết và tác phẩm có nội dung thuộc bản quyền của cá nhân, cơ quan khác, bao gồm tên công ty / tên sản phẩm của người không đăng ký dự thi,... sẽ không được tham gia nếu không được sự cho phép của cơ quan/cá nhân sở hữu.</li>
                                    <li>- Tác phẩm dự thi bằng tiếng Việt, tối đa 1500 chữ.</li>
                                    <li>- JNTO không chịu bất cứ trách nhiệm nào nếu phát sinh khiếu nại từ bên thứ ba về quyền tác giả, hoặc bất kỳ quyền nào khác liên quan đến tác phẩm dự thi. Người tham gia  phải hoàn toàn chịu trách nhiệm và giải quyết các khiếu nại liên quan.</li>
                                    <li>- Nếu JNTO xét thấy bài dự thi có rủi ro vi phạm những điều khoản dưới đây thì bài dự thi sẽ bị hủy bỏ và gỡ xuống mà không cần thông báo trước cho người tham gia.</li>
                                    <li>- Bất kỳ hành vi nào vi phạm bản quyền hoặc các quyền sở hữu trí tuệ khác của bên thứ ba và JNTO.</li>
                                    <li>- Bài dự thi  có hành vi nói xấu, bôi nhọ bên thứ ba và JNTO.</li>
                                    <li>- Bài dự thi có nội dung trái với thuần phong mỹ tục, gây ảnh hưởng đến trật tự xã hội hay hành vi công khai nội dung thông tin, tài liệu.</li>
                                    <li>- Các hành vi xâm phạm tài sản hoặc quyền riêng tư của bên thứ ba và JNTO.</li>
                                    <li>- Các hành vi có mục đích quảng cáo, tuyên truyền cho các sản phẩm hoặc dịch vụ.</li>
                                    <li>- Các hành vi vi phạm pháp luật.</li>
                                    <li>- Các hành vi khác không phù hợp với mục đích của cuộc thi.</li>
                                    <li>- JNTO hoặc bên thứ ba được chỉ định có thể sử dụng miễn phí, đăng tải công khai các tác phẩm dự thi cho các mục đích quảng bá về du lịch Nhật Bản trên các website hoặc phương tiện truyền thông mà không cần thông báo với cá nhân đăng ký dự thi.</li>
                                    <li>- JNTO có thể sử dụng miễn phí các tác phẩm dự thi cho việc sản xuất lịch do văn phòng phát hành.</li>
                                    <li>- Xin lưu ý rằng nội dung và các điều khoản, quy định của cuộc thi có thể được thay đổi hoặc hủy bỏ mà không cần thông báo trước.</li>
                                    <br>
                                    <li><b>Quy trình quyết định và công bố giải thưởng</b></li>
                                    <li>・ JNTO lựa chọn và chấm điểm những tác phẩm xuất sắc nhất.</li>
                                    <li>・ Thông báo về các tác phẩm đoạt giải sẽ được đăng tải trên website và Facebook “Cảm nhận Nhật Bản” của JNTO vào ngày 30 tháng 9 năm 2021 (Thứ Năm).</li>
                                    <li>・ Ban tổ chức sẽ liên hệ với những người thắng giải sau khi công bố kết quả. Trường hợp ban tổ chức không thể liên lạc để thông báo giải thưởng trong vòng 1 tuần, người đoạt giải sẽ mất quyền nhận giải thưởng.</li>
                                    <li>・ Tên của những người có tác phẩm đoạt giải có thể được giới thiệu trên website chính thức của cuộc thi và trên trang Facebook “Cảm nhận Nhật Bản”. Ngoài ra, JNTO có thể sử dụng, trích dẫn các hình ảnh, nội dung tác phẩm cho các dự án khác do JNTO thực hiện.</li>
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
        </div>
    </div>

</section>
