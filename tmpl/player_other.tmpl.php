<?php
$fileserver = (isset($config['fileserver']) ? $config['fileserver'] : '');
$filepath = $interview->media_url;

if (strpos($filepath, 'http://') !== false || strpos($filepath, 'https://') !== false) {
    $linkToMedia = $filepath;
} else {
    $linkToMedia = 'http://' . $fileserver . $interview->file_name;
}

$validClipFormats = array('audio', 'audiotrans', 'video');
$clipFormat = $interview->clip_format;
$mediaFormat = substr($linkToMedia, -3, 3);

if ($mediaFormat == 'mp4') {
    $mediaFormat = "m4v";
}
?>

<div class="centered">
    <?php if (in_array($clipFormat, $validClipFormats)): ?>
    <a href="<?php echo $linkToMedia?>" rel="<?php echo $mediaFormat?>"
       id="subjectPlayer" class="jp-jplayer" onclick="return false;"></a>
    <div id="jp_container_1" class="jp-audio">
      <div class="jp-type-single">
        <div class="jp-gui jp-interface">
          <ul class="jp-controls">
            <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
            <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
            <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
            <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
            <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
            <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
          </ul>
          <div class="jp-progress">
            <div class="jp-seek-bar">
              <div class="jp-play-bar"></div>
            </div>
          </div>
          <div class="jp-volume-bar">
            <div class="jp-volume-bar-value"></div>
          </div>
          <div class="jp-time-holder">
            <div class="jp-current-time"></div>
            <div class="jp-duration"></div>
          </div>
        </div>
        <div class="jp-no-solution">
          <span>Update Required</span>
          To play the media you will need to either update your browser
          to a recent version or update your <a
          href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
        </div>
      </div>
    </div>
    <?php
endif;
?>
</div>
