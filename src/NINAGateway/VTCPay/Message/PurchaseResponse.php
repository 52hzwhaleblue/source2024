<?php
/******************************************************************************
 * NINA VIỆT NAM
 * Email: nina@nina.vn
 * Website: nina.vn
 * Version: 1.1.1 
 * Date 18-09-2024
 * Đây là tài sản của CÔNG TY TNHH TM DV NINA. Vui lòng không sử dụng khi chưa được phép.
 */

namespace NINA\NINAGateway\VTCPay\Message;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\RedirectResponseInterface;
class PurchaseResponse extends Response implements RedirectResponseInterface
{
    /**
     * @var string
     */
    private $redirectUrl;

    /**
     * Khởi tạo đối tượng PurchaseResponse.
     *
     * @param  \Omnipay\Common\Message\RequestInterface  $request
     * @param  array  $data
     * @param  string  $redirectUrl
     */
    public function __construct(RequestInterface $request, array $data, string $redirectUrl)
    {
        $this->redirectUrl = $redirectUrl;

        parent::__construct($request, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function isSuccessful(): bool
    {
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isRedirect(): bool
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function getRedirectUrl(): string
    {
        return $this->redirectUrl;
    }
}
