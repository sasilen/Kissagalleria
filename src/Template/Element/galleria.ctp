<style type="text/css" style="display: none">
.galleria-stage { bottom: 100px !important; /*thumbnail +
20px*/
}

.galleria-thumbnails-container { height: 90px !important;
/*thumbnail + 10px*/
}
.galleria-thumbnails .galleria-image { height: 80px !important;
/*thumbnail size*/
}
</style>

<div class="galleria" style="
      <?=$this->Html->style([
#          'position'=>'absolute',
          'top'=>'10px',
          'bottom'=>'60px',
          'left'=>'10px',
          'right'=>'10px',
          'overflow'=>'hidden',
					'height'=>'600px'
        ]);?>
">

	<?=$this->Kissagalleria->galleria($gallery);?>

	<script>
		(function() {
	    Galleria.loadTheme('/Kissagalleria/js/galleria/themes/classic/galleria.classic.min.js');
	    Galleria.run('.galleria');
		}());
	</script>

  <?php echo $this->Html->script('/Kissagalleria/js/galleria/galleria-1.5.7.min.js',['block'=>'scriptTop']) ?>
</div>
