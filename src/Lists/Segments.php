<?php

namespace Mailchimp_API\Lists;

use Mailchimp_API\Lists;
use Mailchimp_API\Lists\Segments\Members;

class Segments extends Lists
{

    public $grandchild_resource;

    //REQUIRED FIELDS DEFINITIONS
    public $req_post_params = [
        'name'
    ];
    public $req_patch_params = [
        'name'
    ];

    //SUBCLASS INSTANTIATIONS
    public $segment_members;

    function __construct($apikey, $parent_resource, $class_input)
    {
        parent::__construct($apikey, $parent_resource);
        if ($class_input) {
            $this->url .= '/segments/' . $class_input;
        } else {
            $this->url .= '/segments/';
        }

        $this->grandchild_resource = $class_input;

    }
        
    public function BATCH( $add = array() , $remove = array() )
    {
        $params = array('members_to_add' => $add, 'members_to_remove' => $remove);
        $payload = json_encode($params);

        $url = $this->url;
        $response = $this->curlPost($url, $payload);

        return $response;
    }


    //SUBCLASS FUNCTIONS ------------------------------------------------------------

    public function members( $class_input = null )
    {
        $this->segment_members = new Members(
            $this->apikey,
            $this->subclass_resource,
            $this->grandchild_resource,
            $class_input
        );
        return $this->segment_members;
    }
}
