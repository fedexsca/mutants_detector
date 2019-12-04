<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/talent/v4beta1/tenant_service.proto

namespace Google\Cloud\Talent\V4beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * List tenants for which the client has ACL visibility.
 *
 * Generated from protobuf message <code>google.cloud.talent.v4beta1.ListTenantsRequest</code>
 */
class ListTenantsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Resource name of the project under which the tenant is created.
     * The format is "projects/{project_id}", for example,
     * "projects/foo".
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $parent = '';
    /**
     * The starting indicator from which to return results.
     *
     * Generated from protobuf field <code>string page_token = 2;</code>
     */
    private $page_token = '';
    /**
     * The maximum number of tenants to be returned, at most 100.
     * Default is 100 if a non-positive number is provided.
     *
     * Generated from protobuf field <code>int32 page_size = 3;</code>
     */
    private $page_size = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. Resource name of the project under which the tenant is created.
     *           The format is "projects/{project_id}", for example,
     *           "projects/foo".
     *     @type string $page_token
     *           The starting indicator from which to return results.
     *     @type int $page_size
     *           The maximum number of tenants to be returned, at most 100.
     *           Default is 100 if a non-positive number is provided.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Talent\V4Beta1\TenantService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Resource name of the project under which the tenant is created.
     * The format is "projects/{project_id}", for example,
     * "projects/foo".
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. Resource name of the project under which the tenant is created.
     * The format is "projects/{project_id}", for example,
     * "projects/foo".
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * The starting indicator from which to return results.
     *
     * Generated from protobuf field <code>string page_token = 2;</code>
     * @return string
     */
    public function getPageToken()
    {
        return $this->page_token;
    }

    /**
     * The starting indicator from which to return results.
     *
     * Generated from protobuf field <code>string page_token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setPageToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->page_token = $var;

        return $this;
    }

    /**
     * The maximum number of tenants to be returned, at most 100.
     * Default is 100 if a non-positive number is provided.
     *
     * Generated from protobuf field <code>int32 page_size = 3;</code>
     * @return int
     */
    public function getPageSize()
    {
        return $this->page_size;
    }

    /**
     * The maximum number of tenants to be returned, at most 100.
     * Default is 100 if a non-positive number is provided.
     *
     * Generated from protobuf field <code>int32 page_size = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setPageSize($var)
    {
        GPBUtil::checkInt32($var);
        $this->page_size = $var;

        return $this;
    }

}

