<?php

declare(strict_types=1);


namespace Myks92\ValueObjects\Money;


use Myks92\ValueObjects\ValueObjectsInterface;
use ReflectionClass;
use ReflectionException;
use Webmozart\Assert\Assert;

/**
 * Class Currency for job with money
 *
 * @author Maxim Vorozhtsov <myks1992@mail.ru>
 */
class Currency implements ValueObjectsInterface
{
    public const AED = 'AED';
    public const AFN = 'AFN';
    public const ALL = 'ALL';
    public const AMD = 'AMD';
    public const ANG = 'ANG';
    public const AOA = 'AOA';
    public const ARS = 'ARS';
    public const AUD = 'AUD';
    public const AWG = 'AWG';
    public const AZN = 'AZN';
    public const BAM = 'BAM';
    public const BBD = 'BBD';
    public const BDT = 'BDT';
    public const BGN = 'BGN';
    public const BHD = 'BHD';
    public const BIF = 'BIF';
    public const BMD = 'BMD';
    public const BND = 'BND';
    public const BOB = 'BOB';
    public const BRL = 'BRL';
    public const BSD = 'BSD';
    public const BTN = 'BTN';
    public const BWP = 'BWP';
    public const BYR = 'BYR';
    public const BZD = 'BZD';
    public const CAD = 'CAD';
    public const CDF = 'CDF';
    public const CHF = 'CHF';
    public const CLF = 'CLF';
    public const CLP = 'CLP';
    public const CNY = 'CNY';
    public const COP = 'COP';
    public const CRC = 'CRC';
    public const CUP = 'CUP';
    public const CVE = 'CVE';
    public const CZK = 'CZK';
    public const DJF = 'DJF';
    public const DKK = 'DKK';
    public const DOP = 'DOP';
    public const DZD = 'DZD';
    public const EEK = 'EEK';
    public const EGP = 'EGP';
    public const ETB = 'ETB';
    public const EUR = 'EUR';
    public const FJD = 'FJD';
    public const FKP = 'FKP';
    public const GBP = 'GBP';
    public const GEL = 'GEL';
    public const GHS = 'GHS';
    public const GIP = 'GIP';
    public const GMD = 'GMD';
    public const GNF = 'GNF';
    public const GTQ = 'GTQ';
    public const GYD = 'GYD';
    public const HKD = 'HKD';
    public const HNL = 'HNL';
    public const HRK = 'HRK';
    public const HTG = 'HTG';
    public const HUF = 'HUF';
    public const IDR = 'IDR';
    public const ILS = 'ILS';
    public const INR = 'INR';
    public const IQD = 'IQD';
    public const IRR = 'IRR';
    public const ISK = 'ISK';
    public const JEP = 'JEP';
    public const JMD = 'JMD';
    public const JOD = 'JOD';
    public const JPY = 'JPY';
    public const KES = 'KES';
    public const KGS = 'KGS';
    public const KHR = 'KHR';
    public const KMF = 'KMF';
    public const KPW = 'KPW';
    public const KRW = 'KRW';
    public const KWD = 'KWD';
    public const KYD = 'KYD';
    public const KZT = 'KZT';
    public const LAK = 'LAK';
    public const LBP = 'LBP';
    public const LKR = 'LKR';
    public const LRD = 'LRD';
    public const LSL = 'LSL';
    public const LTL = 'LTL';
    public const LVL = 'LVL';
    public const LYD = 'LYD';
    public const MAD = 'MAD';
    public const MDL = 'MDL';
    public const MGA = 'MGA';
    public const MKD = 'MKD';
    public const MMK = 'MMK';
    public const MNT = 'MNT';
    public const MOP = 'MOP';
    public const MRO = 'MRO';
    public const MUR = 'MUR';
    public const MVR = 'MVR';
    public const MWK = 'MWK';
    public const MXN = 'MXN';
    public const MYR = 'MYR';
    public const MZN = 'MZN';
    public const NAD = 'NAD';
    public const NGN = 'NGN';
    public const NIO = 'NIO';
    public const NOK = 'NOK';
    public const NPR = 'NPR';
    public const NZD = 'NZD';
    public const OMR = 'OMR';
    public const PAB = 'PAB';
    public const PEN = 'PEN';
    public const PGK = 'PGK';
    public const PHP_ = 'PHP'; // "php" is a PHP reserved word
    public const PKR = 'PKR';
    public const PLN = 'PLN';
    public const PYG = 'PYG';
    public const QAR = 'QAR';
    public const RON = 'RON';
    public const RSD = 'RSD';
    public const RUB = 'RUB';
    public const RWF = 'RWF';
    public const SAR = 'SAR';
    public const SBD = 'SBD';
    public const SCR = 'SCR';
    public const SDG = 'SDG';
    public const SEK = 'SEK';
    public const SGD = 'SGD';
    public const SHP = 'SHP';
    public const SLL = 'SLL';
    public const SOS = 'SOS';
    public const SRD = 'SRD';
    public const STD = 'STD';
    public const SVC = 'SVC';
    public const SYP = 'SYP';
    public const SZL = 'SZL';
    public const THB = 'THB';
    public const TJS = 'TJS';
    public const TMT = 'TMT';
    public const TND = 'TND';
    public const TOP = 'TOP';
    public const TRY_ = 'TRY'; // "try" is a PHP reserved word
    public const TTD = 'TTD';
    public const TWD = 'TWD';
    public const TZS = 'TZS';
    public const UAH = 'UAH';
    public const UGX = 'UGX';
    public const USD = 'USD';
    public const UYU = 'UYU';
    public const UZS = 'UZS';
    public const VEF = 'VEF';
    public const VND = 'VND';
    public const VUV = 'VUV';
    public const WST = 'WST';
    public const XAF = 'XAF';
    public const XCD = 'XCD';
    public const XDR = 'XDR';
    public const XOF = 'XOF';
    public const XPF = 'XPF';
    public const YER = 'YER';
    public const ZAR = 'ZAR';
    public const ZMK = 'ZMK';
    public const ZWL = 'ZWL';

    /**
     * @var string
     */
    protected string $code;

    /**
     * @param string $code
     *
     * @throws ReflectionException
     */
    public function __construct(string $code)
    {
        Assert::oneOf($code, $this->toArray());
        $this->code = $code;
    }

    /**
     * @return array
     * @throws ReflectionException
     */
    public function toArray(): array
    {
        return (new ReflectionClass(static::class))->getConstants();
    }

    /**
     * @inheritDoc
     */
    public function __toString(): string
    {
        return $this->getCode();
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param Currency $currency
     *
     * @return bool
     */
    public function isEqualTo(self $currency): bool
    {
        return $this->getCode() === $currency->getCode();
    }
}