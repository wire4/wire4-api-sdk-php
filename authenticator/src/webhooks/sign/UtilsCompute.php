<?php
/*
 * COPYRIGHT © 2017. TCPIP.
 * PATENT PENDING. ALL RIGHTS RESERVED.
 * SPEI GATEWAY IS REGISTERED TRADEMARKS OF TCPIP.
 *
 * This software is confidential and proprietary information of TCPIP.
 * You shall not disclose such Confidential Information and shall use it only
 * in accordance with the company policy.
 */

namespace mx\wire4\webhooks\sign;


class UtilsCompute {

    static $HMAC_SHA512 = "sha512";

    public static function computeHmacSha512($message, $key) {

       return  hash_hmac(self::$HMAC_SHA512, $message,$key,true);

    }

    public static function compareSignatures($signatureA, $signatureB) {

        return hash_equals($signatureA,$signatureB);

    }

    public static function toExadecimal($value) {

        return unpack('H*', $value)[1];

    }


}