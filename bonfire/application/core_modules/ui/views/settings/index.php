<?php if (validation_errors()) : ?>
<div class="alert alert-error fade in">
	<a class="close" data-dismiss="alert">&times;</a>
	<p><?php echo validation_errors(); ?></p>
</div>
<?php endif; ?>

<?php echo form_open($this->uri->uri_string(), array('class' => "form-horizontal", 'id' => 'shortcut_form')); ?>
	<input type="hidden" name="remove_action" id="remove_action" />

	<fieldset>
		<legend><?php echo lang('ui_shortcuts') ?></legend>

		<div class="alert alert-info fade in">
			<a class="close" data-dismiss="alert">&times;</a>
			<?php echo lang('ui_keyboard_shortcuts'); ?>
		</div>

		<?php $count = 1; ?>
		<table class="table table-striped table-condensed">
			<thead>
				<tr>
					<th><?php echo lang('ui_action') ?></th>
					<th colspan="2"><?php echo lang('ui_shortcut') ?> <span class="help-inline"><?php echo lang('ui_shortcut_help') ?></span></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<select id="action<?php echo $count;?>" name="action<?php echo $count;?>" class="medium">
						<?php foreach ($current as $name => $detail): ?>
							<?php if (!array_key_exists($name, $settings)):?>
								<option value="<?php echo $name;?>"><?php echo $detail['description'];?></option>
							<?php endif; ?>
						<?php endforeach; ?>
						</select>
					</td>
					<td>
						<input type="text" id="shortcut<?php echo $count;?>" name="shortcut<?php echo $count;?>" class="medium" value="<?php echo isset($shortcut) ? $shortcut : set_value('shortcuts['.$count.']') ?>" />
					</td>
					<td>
						<input type="submit" name="add_shortcut" class="btn" id="add_shortcut<?php echo $count;?>" value="<?php echo lang('ui_add_shortcut') ?>" class="button" />
					</td>
				</tr>
				<?php foreach ($settings as $action => $shortcut): ?>
					<?php $count++; ?>
					<tr id="shortcut<?php echo $count; ?>">
						<td id="shortcut<?php echo $count; ?>">
							<input type="hidden" id="action<?php echo $count;?>" name="action[<?php echo $count;?>]"  value="<?php echo isset($action) ? $action : set_value('actions['.$count.']') ?>" />
							<?php echo $current[$action]['description'] ?>
						</td>
						<td>
							<input type="text" id="shortcut<?php echo $count;?>" name="shortcut[<?php echo $count;?>]"  value="<?php echo isset($shortcut) ? $shortcut : set_value('shortcuts['.$count.']') ?>" />
						</td>
						<td>
							<input type="submit" name="remove_shortcut" id="remove_shortcut<?php echo $count;?>" value="<?php echo lang('ui_remove_shortcut') ?>" class="btn btn-danger" />
						</td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="submit" class="btn btn-primary" id="update" value="<?php echo lang('ui_update_shortcuts') ?>" /></td>
					<td>&nbsp;</td>
				</tr>
			</tbody>
		</table>
	</fieldset>

<?php echo form_close(); ?>