<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.1.1 
 * Date 18-09-2024
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINA\NINAGateway\VTCPay\Message\Concerns;
trait ResponseProperties
{
    /**
     * Phương thức hổ trợ tạo các thuộc tính của đối tượng từ dữ liệu gửi về từ VTCPay.
     *
     * @param  string  $name
     * @return null|string
     */
    public function __get($name)
    {
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            trigger_error(sprintf('Undefined property: %s::%s', __CLASS__, '$'.$name), E_USER_NOTICE);

            return;
        }
    }

    /**
     * Phương thức hổ trợ bảo vệ các thuộc tính của đối tượng từ dữ liệu gửi về từ VTCPay.
     *
     * @param  string  $name
     * @param  mixed  $value
     * @return null|string
     */
    public function __set($name, $value)
    {
        if (isset($this->data[$name])) {
            trigger_error(sprintf('Undefined property: %s::%s', __CLASS__, '$'.$name), E_USER_NOTICE);
        } else {
            $this->$name = $value;
        }
    }
}