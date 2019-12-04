<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1beta1/model_evaluation.proto

namespace GPBMetadata\Google\Cloud\Automl\V1Beta1;

class ModelEvaluation
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Classification::initOnce();
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Detection::initOnce();
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Regression::initOnce();
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Tables::initOnce();
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\TextExtraction::initOnce();
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\TextSentiment::initOnce();
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\Translation::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Api\Annotations::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0a830c0a32676f6f676c652f636c6f75642f6175746f6d6c2f7631626574" .
            "61312f6d6f64656c5f6576616c756174696f6e2e70726f746f121b676f6f" .
            "676c652e636c6f75642e6175746f6d6c2e763162657461311a2b676f6f67" .
            "6c652f636c6f75642f6175746f6d6c2f763162657461312f646574656374" .
            "696f6e2e70726f746f1a2c676f6f676c652f636c6f75642f6175746f6d6c" .
            "2f763162657461312f72656772657373696f6e2e70726f746f1a28676f6f" .
            "676c652f636c6f75642f6175746f6d6c2f763162657461312f7461626c65" .
            "732e70726f746f1a31676f6f676c652f636c6f75642f6175746f6d6c2f76" .
            "3162657461312f746578745f65787472616374696f6e2e70726f746f1a30" .
            "676f6f676c652f636c6f75642f6175746f6d6c2f763162657461312f7465" .
            "78745f73656e74696d656e742e70726f746f1a2d676f6f676c652f636c6f" .
            "75642f6175746f6d6c2f763162657461312f7472616e736c6174696f6e2e" .
            "70726f746f1a1f676f6f676c652f70726f746f6275662f74696d65737461" .
            "6d702e70726f746f1a1c676f6f676c652f6170692f616e6e6f746174696f" .
            "6e732e70726f746f22a7070a0f4d6f64656c4576616c756174696f6e1269" .
            "0a21636c617373696669636174696f6e5f6576616c756174696f6e5f6d65" .
            "747269637318082001280b323c2e676f6f676c652e636c6f75642e617574" .
            "6f6d6c2e763162657461312e436c617373696669636174696f6e4576616c" .
            "756174696f6e4d657472696373480012610a1d72656772657373696f6e5f" .
            "6576616c756174696f6e5f6d65747269637318182001280b32382e676f6f" .
            "676c652e636c6f75642e6175746f6d6c2e763162657461312e5265677265" .
            "7373696f6e4576616c756174696f6e4d657472696373480012630a1e7472" .
            "616e736c6174696f6e5f6576616c756174696f6e5f6d6574726963731809" .
            "2001280b32392e676f6f676c652e636c6f75642e6175746f6d6c2e763162" .
            "657461312e5472616e736c6174696f6e4576616c756174696f6e4d657472" .
            "696373480012770a29696d6167655f6f626a6563745f646574656374696f" .
            "6e5f6576616c756174696f6e5f6d657472696373180c2001280b32422e67" .
            "6f6f676c652e636c6f75642e6175746f6d6c2e763162657461312e496d61" .
            "67654f626a656374446574656374696f6e4576616c756174696f6e4d6574" .
            "72696373480012750a28766964656f5f6f626a6563745f747261636b696e" .
            "675f6576616c756174696f6e5f6d657472696373180e2001280b32412e67" .
            "6f6f676c652e636c6f75642e6175746f6d6c2e763162657461312e566964" .
            "656f4f626a656374547261636b696e674576616c756174696f6e4d657472" .
            "696373480012680a21746578745f73656e74696d656e745f6576616c7561" .
            "74696f6e5f6d657472696373180b2001280b323b2e676f6f676c652e636c" .
            "6f75642e6175746f6d6c2e763162657461312e5465787453656e74696d65" .
            "6e744576616c756174696f6e4d6574726963734800126a0a22746578745f" .
            "65787472616374696f6e5f6576616c756174696f6e5f6d65747269637318" .
            "0d2001280b323c2e676f6f676c652e636c6f75642e6175746f6d6c2e7631" .
            "62657461312e5465787445787472616374696f6e4576616c756174696f6e" .
            "4d6574726963734800120c0a046e616d65180120012809121a0a12616e6e" .
            "6f746174696f6e5f737065635f696418022001280912140a0c646973706c" .
            "61795f6e616d65180f20012809122f0a0b6372656174655f74696d651805" .
            "2001280b321a2e676f6f676c652e70726f746f6275662e54696d65737461" .
            "6d70121f0a176576616c75617465645f6578616d706c655f636f756e7418" .
            "062001280542090a076d65747269637342a5010a1f636f6d2e676f6f676c" .
            "652e636c6f75642e6175746f6d6c2e7631626574613150015a41676f6f67" .
            "6c652e676f6c616e672e6f72672f67656e70726f746f2f676f6f676c6561" .
            "7069732f636c6f75642f6175746f6d6c2f763162657461313b6175746f6d" .
            "6cca021b476f6f676c655c436c6f75645c4175746f4d6c5c563162657461" .
            "31ea021e476f6f676c653a3a436c6f75643a3a4175746f4d4c3a3a563162" .
            "65746131620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}

