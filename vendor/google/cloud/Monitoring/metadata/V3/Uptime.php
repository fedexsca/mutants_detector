<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/monitoring/v3/uptime.proto

namespace GPBMetadata\Google\Monitoring\V3;

class Uptime
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\MonitoredResource::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        $pool->internalAddGeneratedFile(hex2bin(
            "0afe110a21676f6f676c652f6d6f6e69746f72696e672f76332f75707469" .
            "6d652e70726f746f1214676f6f676c652e6d6f6e69746f72696e672e7633" .
            "1a1e676f6f676c652f70726f746f6275662f6475726174696f6e2e70726f" .
            "746f22e6010a0f496e7465726e616c436865636b6572120c0a046e616d65" .
            "18012001280912140a0c646973706c61795f6e616d65180220012809120f" .
            "0a076e6574776f726b18032001280912100a086763705f7a6f6e65180420" .
            "01280912170a0f706565725f70726f6a6563745f6964180620012809123a" .
            "0a05737461746518072001280e322b2e676f6f676c652e6d6f6e69746f72" .
            "696e672e76332e496e7465726e616c436865636b65722e53746174652233" .
            "0a055374617465120f0a0b554e5350454349464945441000120c0a084352" .
            "454154494e471001120b0a0752554e4e494e4710023a02180122d70b0a11" .
            "557074696d65436865636b436f6e666967120c0a046e616d651801200128" .
            "0912140a0c646973706c61795f6e616d65180220012809123b0a126d6f6e" .
            "69746f7265645f7265736f7572636518032001280b321d2e676f6f676c65" .
            "2e6170692e4d6f6e69746f7265645265736f757263654800124f0a0e7265" .
            "736f757263655f67726f757018042001280b32352e676f6f676c652e6d6f" .
            "6e69746f72696e672e76332e557074696d65436865636b436f6e6669672e" .
            "5265736f7572636547726f7570480012470a0a687474705f636865636b18" .
            "052001280b32312e676f6f676c652e6d6f6e69746f72696e672e76332e55" .
            "7074696d65436865636b436f6e6669672e48747470436865636b48011245" .
            "0a097463705f636865636b18062001280b32302e676f6f676c652e6d6f6e" .
            "69746f72696e672e76332e557074696d65436865636b436f6e6669672e54" .
            "6370436865636b480112290a06706572696f6418072001280b32192e676f" .
            "6f676c652e70726f746f6275662e4475726174696f6e122a0a0774696d65" .
            "6f757418082001280b32192e676f6f676c652e70726f746f6275662e4475" .
            "726174696f6e12500a10636f6e74656e745f6d6174636865727318092003" .
            "280b32362e676f6f676c652e6d6f6e69746f72696e672e76332e55707469" .
            "6d65436865636b436f6e6669672e436f6e74656e744d6174636865721241" .
            "0a1073656c65637465645f726567696f6e73180a2003280e32272e676f6f" .
            "676c652e6d6f6e69746f72696e672e76332e557074696d65436865636b52" .
            "6567696f6e12170a0b69735f696e7465726e616c180f2001280842021801" .
            "12440a11696e7465726e616c5f636865636b657273180e2003280b32252e" .
            "676f6f676c652e6d6f6e69746f72696e672e76332e496e7465726e616c43" .
            "6865636b6572420218011a610a0d5265736f7572636547726f757012100a" .
            "0867726f75705f6964180120012809123e0a0d7265736f757263655f7479" .
            "706518022001280e32272e676f6f676c652e6d6f6e69746f72696e672e76" .
            "332e47726f75705265736f75726365547970651afa020a09487474704368" .
            "65636b120f0a077573655f73736c180120012808120c0a04706174681802" .
            "20012809120c0a04706f727418032001280512580a09617574685f696e66" .
            "6f18042001280b32452e676f6f676c652e6d6f6e69746f72696e672e7633" .
            "2e557074696d65436865636b436f6e6669672e48747470436865636b2e42" .
            "6173696341757468656e7469636174696f6e12140a0c6d61736b5f686561" .
            "64657273180520012808124f0a076865616465727318062003280b323e2e" .
            "676f6f676c652e6d6f6e69746f72696e672e76332e557074696d65436865" .
            "636b436f6e6669672e48747470436865636b2e48656164657273456e7472" .
            "7912140a0c76616c69646174655f73736c1807200128081a390a13426173" .
            "696341757468656e7469636174696f6e12100a08757365726e616d651801" .
            "2001280912100a0870617373776f72641802200128091a2e0a0c48656164" .
            "657273456e747279120b0a036b6579180120012809120d0a0576616c7565" .
            "1802200128093a0238011a180a08546370436865636b120c0a04706f7274" .
            "1801200128051a98020a0e436f6e74656e744d617463686572120f0a0763" .
            "6f6e74656e74180120012809125c0a076d61746368657218022001280e32" .
            "4b2e676f6f676c652e6d6f6e69746f72696e672e76332e557074696d6543" .
            "6865636b436f6e6669672e436f6e74656e744d6174636865722e436f6e74" .
            "656e744d6174636865724f7074696f6e2296010a14436f6e74656e744d61" .
            "74636865724f7074696f6e12260a22434f4e54454e545f4d415443484552" .
            "5f4f5054494f4e5f554e535045434946494544100012130a0f434f4e5441" .
            "494e535f535452494e47100112170a134e4f545f434f4e5441494e535f53" .
            "5452494e47100212110a0d4d4154434845535f5245474558100312150a11" .
            "4e4f545f4d4154434845535f52454745581004420a0a087265736f757263" .
            "6542140a12636865636b5f726571756573745f74797065226e0a0d557074" .
            "696d65436865636b497012370a06726567696f6e18012001280e32272e67" .
            "6f6f676c652e6d6f6e69746f72696e672e76332e557074696d6543686563" .
            "6b526567696f6e12100a086c6f636174696f6e18022001280912120a0a69" .
            "705f616464726573731803200128092a650a11557074696d65436865636b" .
            "526567696f6e12160a12524547494f4e5f554e5350454349464945441000" .
            "12070a035553411001120a0a064555524f5045100212110a0d534f555448" .
            "5f414d4552494341100312100a0c415349415f5041434946494310042a5b" .
            "0a1147726f75705265736f7572636554797065121d0a195245534f555243" .
            "455f545950455f554e5350454349464945441000120c0a08494e5354414e" .
            "4345100112190a154157535f454c425f4c4f41445f42414c414e43455210" .
            "0242a3010a18636f6d2e676f6f676c652e6d6f6e69746f72696e672e7633" .
            "420b557074696d6550726f746f50015a3e676f6f676c652e676f6c616e67" .
            "2e6f72672f67656e70726f746f2f676f6f676c65617069732f6d6f6e6974" .
            "6f72696e672f76333b6d6f6e69746f72696e67aa021a476f6f676c652e43" .
            "6c6f75642e4d6f6e69746f72696e672e5633ca021a476f6f676c655c436c" .
            "6f75645c4d6f6e69746f72696e675c5633620670726f746f33"
        ), true);

        static::$is_initialized = true;
    }
}
