<?php
  if(!empty($researchParticipants)){
   foreach($researchParticipants as $participant){
    $participant = explode(' -', $participant);
    $participantinfo = get_page_by_title($participant[0], OBJECT, 'participant');
    $participant_quotes = get_post_meta($participantinfo->ID, '_participant_quotes', TRUE);
    $participant_meetings = get_post_meta($participantinfo->ID, '_participant_meetings', TRUE);?>

    <div class="modal participant-modal fade" id="participant-<?php echo $participantinfo->ID; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <div class="thumb-wrapper">
              <?php
              if(has_post_thumbnail($participantinfo->ID)){
                echo get_the_post_thumbnail($participantinfo->ID, 'participant-thumb');
              }
              else{
                echo '<img width="100px" src="' .  get_stylesheet_directory_uri() . '/library/images/blank.jpg">';
              }?>
            </div>
            <div class="participant-details">
              <h3 class="modal-title">
                <?php echo $participantinfo->post_title;
                  $linked = get_post_meta($participantinfo->ID, '_participant_linkedin', TRUE);
                  if(!empty($linked)){
                  echo '<a href="'. $linked .'" target="_blank"><i class="fa fa-linkedin"></i></a>';
                  }
                ?>
              </h3>
              <h4><?php echo get_post_meta($participantinfo->ID, '_participant_title', TRUE) . ' at ' . get_post_meta($participantinfo->ID, '_participant_company', TRUE); ?></h4>
              <?php
              if(!empty($participant_meetings)){
                foreach($participant_meetings as $meeting){
                  if($meeting['interview_campaign'] == $post->ID){
                    echo '<p>'. $meeting['meetingdate'] . '</p>';
                  }
                }
              }?>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <!-- end modal-header -->
          <!-- recording for this campaign meeting
          TODO: Accomodate multiple recordings for the same meeting/campaign -->
          <?php
          if(!empty($participant_meetings)){
            foreach($participant_meetings as $meeting){
              if($meeting['interview_campaign'] == $post->ID && isset($meeting['recording'])){
                echo '
                  <div class="recording" data-src="'. $meeting['recording'] .'"></div>';
                /*
				echo '
                  <div class="recording" data-src="'. $meeting['recording'] .'">
                    <audio controls>
                      <source src="'. $meeting['recording'] .'" type="audio/mpeg">
                    Your browser does not support the audio element.
                    </audio>
                  </div>';
				  */
              }
              if($meeting['interview_campaign'] == $post->ID && isset($meeting['transcript'])){
                echo '
                  <div class="modal-downloads">
                    <a href="' . $meeting['transcript'] .'">Download Transcript</a>
                  </div>';
              }
            }
          }?>

          <div class="modal-section">
            <h4>Quotes</h4>
            <?php
            $hasquote = false;
            if(!empty($participant_quotes)){
              foreach($participant_quotes as $quote){
                if($quote['campaign'] == $post->ID){
                   echo '<p>"'. $quote['quote'] . '"</p>';
                   $hasquote = true;
                }
              }
             }
             if(!$hasquote){
               echo '<p><em>No quote was added.</em></p>';
             }?>
          </div>


          <div class="modal-section">
            <h4>Notes</h4>
            <?php
            $hasnotes = false;
            if(!empty($participant_meetings)){
              foreach($participant_meetings as $meeting){
                if($meeting['interview_campaign'] == $post->ID){
                   echo '<p>'. $meeting['notes'] . '</p>';
                   $hasnotes = true;
                }
              }
             }
             if(!$hasnotes){
               echo '<p><em>No notes were added.</em></p>';
             }?>
          </div>

          <a class="view-full" href="<?php echo get_permalink($participantinfo->ID); ?>">View Full Participant Profile</a>
        </div>
      </div>
    </div>
  <?php }
}?>
