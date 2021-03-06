<?php
    $cformQuery = $query->get('contact-form');


    $descriptionQuery = $query->get('description');


    if( $descriptionQuery->get('show') ) {
        $cformClass = 'col-sm-offset-1 col-sm-6';
    } else {
        $cformClass = 'col-sm-12';
    }
?>


<div class="row">
    <div class="<?php echo esc_attr( $cformClass ); ?>">


        <form id="contact-form" class="ff-cform" name="contact-form" action="assets/php/send.php" method="post">
            <fieldset>
                <div id="alert-area"></div>

                <input class="col-xs-12" id="name" type="text" name="name" placeholder="<?php echo esc_attr( $cformQuery->get('name') ); ?>">

                <input class="col-xs-12" id="email" type="text" name="email" placeholder="<?php echo esc_attr( $cformQuery->get('email') ); ?>">

                <input class="col-xs-12" id="subject" type="text" name="subject" placeholder="<?php echo esc_attr( $cformQuery->get('subject') ); ?>">

                <textarea class="col-xs-12" id="message" name="message" rows="8" cols="25" placeholder="<?php echo esc_attr( $cformQuery->get('message') ); ?>"></textarea>

                <input class="btn btn-default" id="submit" type="submit" name="submit" value="<?php echo esc_attr( $cformQuery->get('button') ); ?>">

            </fieldset>

            <?php

            $data = array();

            $data['email'] = $query->get('contact-form-user-input email');
            $data['subject'] = $query->get('contact-form-user-input subject');

            $data = json_encode( $data );

            $cfMessages = $query->get('contact-form-messages');

            echo '<div class="ff-contact-info">'.ffContainer::getInstance()->getCiphers()->freshfaceCipher_encode( $data ).'</div>';

            echo '<div class="ff-contact-messages">';

                echo '<div class="ff-validation-name">' . ff_wp_kses( $cfMessages->get('validation-name') ) . '</div>';
                echo '<div class="ff-validation-email">'. ff_wp_kses( $cfMessages->get('validation-email') ) . '</div>';
                echo '<div class="ff-validation-email-format">'. ff_wp_kses( $cfMessages->get('validation-email-format') ) . '</div>';
                echo '<div class="ff-validation-message">'. ff_wp_kses( $cfMessages->get('validation-message') ) . '</div>';
                echo '<div class="ff-validation-message-minlength">'. ff_wp_kses( $cfMessages->get('validation-message-minlength') ) . '</div>';
                echo '<div class="ff-message-send-ok">'. ff_wp_kses( $cfMessages->get('message-send-ok') ) . '</div>';
                echo '<div class="ff-message-send-wrong">' . ff_wp_kses( $cfMessages->get('message-send-wrong') ) . '</div>';

            echo '</div>';

            ?>
        </form>

    </div><!-- col -->

    <?php if( $descriptionQuery->get('show') ) { ?>
        <div class="col-sm-5">

            <div class="widget widget_contact">

                <h3 class="widget-title"><?php echo ff_wp_kses( $descriptionQuery->get('title') ); ?></h3>

                <ul>
                    <?php
                        foreach( $descriptionQuery->get('description-boxes') as $oneBox ) {
                            echo '<li>';

                                foreach( $oneBox->get('lines') as $oneLine ) {
                                    $type = $oneLine->getVariationType();

                                    if( $type == 'one-line' ) {
                                        echo ff_wp_kses( $oneLine->get('text') ) . '<br>';
                                    } else if ( $type == 'one-heading' ) {
                                        echo '<span>' . ff_wp_kses( $oneLine->get('text') ) . '</span>';
                                    } else if ( $type == 'one-email' ) {
                                        echo '<a href="mailto:'.esc_attr( $oneLine->get('text') ).'">'.ff_wp_kses( $oneLine->get('text') ).'</a><br>';
                                    }
                                }

                            echo '</li>';
                        }
                    ?>

                </ul>

            </div><!-- widget-contact -->

        </div><!-- col -->
    <?php } ?>
</div><!-- row -->