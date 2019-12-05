<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/bigtable/v2/data.proto

namespace Google\Cloud\Bigtable\V2\Mutation;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A Mutation which deletes all cells from the specified column family.
 *
 * Generated from protobuf message <code>google.bigtable.v2.Mutation.DeleteFromFamily</code>
 */
class DeleteFromFamily extends \Google\Protobuf\Internal\Message
{
    /**
     * The name of the family from which cells should be deleted.
     * Must match `[-_.a-zA-Z0-9]+`
     *
     * Generated from protobuf field <code>string family_name = 1;</code>
     */
    private $family_name = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $family_name
     *           The name of the family from which cells should be deleted.
     *           Must match `[-_.a-zA-Z0-9]+`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Bigtable\V2\Data::initOnce();
        parent::__construct($data);
    }

    /**
     * The name of the family from which cells should be deleted.
     * Must match `[-_.a-zA-Z0-9]+`
     *
     * Generated from protobuf field <code>string family_name = 1;</code>
     * @return string
     */
    public function getFamilyName()
    {
        return $this->family_name;
    }

    /**
     * The name of the family from which cells should be deleted.
     * Must match `[-_.a-zA-Z0-9]+`
     *
     * Generated from protobuf field <code>string family_name = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setFamilyName($var)
    {
        GPBUtil::checkString($var, True);
        $this->family_name = $var;

        return $this;
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeleteFromFamily::class, \Google\Cloud\Bigtable\V2\Mutation_DeleteFromFamily::class);
