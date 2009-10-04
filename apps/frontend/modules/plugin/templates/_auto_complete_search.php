<?php $sf_response->addJavascript('jquery.autocomplete.js') ?>
<?php $sf_response->addStylesheet('jquery.autocomplete.css') ?>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    $('#plugin_search_input').autocomplete('<?php echo url_for("@plugin_autocomplete") ?>', {
      delay:10,
			minChars:2,
			matchSubset:1,
			matchContains:1,
			cacheLength:10,
			autoFill:false
    });
  });
</script>
<div class='plugin_search_form'>
<?php use_helper('Form') ?>
<?php echo form_tag('@plugin_search', array('class' => 'search-controls')) ?>
  <?php echo input_tag('form[query]', 'Search Plugins...', array('id' => 'plugin_search_input', 'onblur' => "if(this.value=='') this.value='Search Plugins...';", 'onfocus' => "if(this.value=='Search Plugins...') this.value='';")) ?>
  <?php echo submit_tag('Go', array('id' => 'plugin_search_button')) ?>
<span id='indicator' style='display:none'><?php echo image_tag('ajax-loader.gif') ?></span>
</form>
<div id='ajax-search-results'></div>
</div>