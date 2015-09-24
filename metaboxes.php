<?php

class B5F_Dynamic_Meta_Boxes 
{
    private $boxes;

    # Safe to start up
    public function __construct( $args )
    {
        $this->boxes = $args;
        add_action( 'plugins_loaded', array( $this, 'start_up' ) );
    }

    public function start_up()
    {
        add_action( 'add_meta_boxes', array( $this, 'add_mb' ) );
    }

    public function add_mb()
    {
        foreach( $this->boxes as $box )
            add_meta_box( 
                $box['id'], 
                $box['title'], 
                array( $this, 'mb_callback' ), 
                $box['post_type'], 
                isset( $box['context'] ) ? $box['context'] : 'normal', 
                isset( $box['priority'] ) ? $box['priority'] : 'default', 
                $box['args']
            );
    }

    # Callback function, uses helper function to print each meta box
    public function mb_callback( $post, $box )
    {
        switch( $box['args']['field'] )
        {
            case 'textfield':
                $this->textfield( $box, $post->ID );
            break;
            case 'checkbox':
                $this->checkbox( $box, $post->ID );
            break;
			case 'textarea':
                $this->textarea( $box, $post->ID );
            break;
        }
    }

    private function textfield( $box, $post_id )
    {
        $post_meta = get_post_meta( $post_id, $box['id'], true );
        printf(
            '<label>%s: <input type="text" name="%s" value="%s" /></label> <small>%s</small><br/>',
            $box['title'],
            $box['id'],
            $post_meta,
            $box['args']['desc']
        );
    }

    private function checkbox( $box, $post_id )
    {
        $post_meta = get_post_meta( $post_id, $box['id'], true );
        printf(
            '<label>%s: </label><input type="checkbox" name="%s" %s /> <small>%s</small><br/>',
            $box['title'],
            $box['id'],
            checked( 1, $post_meta, false ),
            $box['args']['desc']
        );
    }
	
	 private function textarea( $box, $post_id )
    {
        $post_meta = get_post_meta( $post_id, $box['id'], true );
        printf(
            '<label>%s: </label><textarea name="%s"  />%s </textarea><small>%s</small><br/>',
            $box['title'],
            $box['id'],
            $post_meta,
            $box['args']['desc']
        );
    }
}
?>