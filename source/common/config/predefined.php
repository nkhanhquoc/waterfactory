<?php

/**
 *  define const default
 */
define('NO_IMAGE', '/img/no-image.png');
define('MODULE_READY', '/img/module_ready.png');
define('MODULE_SETTING', '/img/module_setting.png');
define('MODULE_ALARM', '/img/module_alarm.png');
#STATUS CONFIRM
define('CONFIRM_STATUS', 3);
#ie header
define('ID_HEADER', '01110000000010000000');
define('IMSI_HEADER', '0111010100001010');
#Phân phối ID cho Module (với một SIM cho trước), dùng cho quá trình khởi tạo một Module mới hoặc tái quy hoạch ID.
define('ID_ASSIGNMENT_HEADER', '10100000');
#Chọn 1 chế độ trong 32 chế độ của hệ thống
define('SYSTEM_MODE_CONFIG_HEADER', '10000000');
define('SYSTEM_MODE_HEADER', '0000000011000001');
#Chọn chế độ Auto/Manual cho các tải
define('OUTPUT_MODE_HEADER', '0000000111011000');
define('OUTPUT_MODE_CONFIG_HEADER', '10000001');
#Các giá trị ngưỡng hoạt động của hệ thống
define('PARAMETER_CONFIG_HEADER', '10000010');
define('PARAMETER_HEADER', '0000001011010010');
#Reset mật khẩu về mặc định cho Module
define('PASS_RESET_HEADER', '10100100');
#Đặt giá trị timer/counter cho VĐK
define('TIMER_COUNTER_CONFIG_HEADER', '10000011');
define('TIMER_COUNTER_HEADER', '0000001111000100');
#Kiểm tra chế độ hoạt động của module
define('CHECK_SYSTEM_MODE_HEADER', '10000100');
#Kiểm tra chế độ hoạt động của tải
define('CHECK_OUTPUT_MODE_HEADER', '10000100');
#Kiểm tra giá trị ngưỡng đang cài đặt ở Module
define('CHECK_PARAMETER_HEADER', '10000110');
#Kiểm tra giá TIMER và COUNTER đang  cài đặt ở Module
define('CHECK_TIMER_COUNTER_HEADER', '10000111');
#Kiểm tra ID của một Module nào đó (SIM đã biết trước)
define('CHECK_MODULE_ID_HEADER', '10100001');
#Kiểm tra tiền và dung lượng trong tài khoản SIM của Module
define('CHECK_ACCOUNT_HEADER', '10100010');
define('CHECK_MONEY_DATA_HEADER', '0111001011001110');
#Gửi mã thẻ cào xuống Module để nạp. Sau khi nhận được bản tin này, Module sẽ thực hiện việc nạp thẻ.
define('RECHARGE_ACCOUNT_HEADER', '10100011');
define('CARD_CODE_HEADER', '0111010011010110');
#Xác nhận đã nhận được báo cáo dừng khẩn cấp từ Module
define('HARD_EMERGENCY_STOP_ACKNOWLEDGE_HEADER', '10110000');
#Thông báo đã nhận được bản tin CANCEL dừng khẩn cấp từ phía Module (khi khắc phục xong lỗi).
define('HARD_EMERGENCY_RESET_ACKNOWLEDGE_HEADER', '10110001');
#Thông báo kích hoạt dừng khẩn cấp từ Server, Module sẽ phải tắt hết tải khi nhận được bản tin này.
define('SOFT_EMERGENCY_STOP_NOTIFY_HEADER', '10110010');
#Thông báo đã nhận được bản tin CANCEL dừng khẩn cấp từ phía Module (khi khắc phục xong lỗi).
define('SOFT_EMERGENCY_RESET_ACKNOWLEDGE_HEADER', '10110011');
#Gửi yêu cầu cập nhật SENSOR VALUE và ON/OFF STATUS
define('CHECK_SYSTEM_STATUS_HEADER', '10001000');

#output mode
define('MANUAL_B1', '00000000');
define('MANUAL_B2', '00000001');
define('MANUAL_B12', '00000010');
define('AUTO_B1', '00000011');
define('AUTO_B2', '00000100');
define('PUMP_SLAVE', '00000000');
define('PUMP_MASTER', '00000001');
define('PUMP_ALL', '00000011');
#du phong
define('ID_ASSIGNMENT_DP', '00000000000000000000');
define('BACKUP', '00000000');
