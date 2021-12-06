<?php if ($field['table']): ?>
	<div class="ExpandableTablesSection">
		<div class="Container">
			<div class="ExpandableTablesSection_wrapper">
				<?php if ($field['headings']): ?>
					<div class="Tabs Tabs-expandableTables hidden-mdPlus">
						<ul class="Tabs_list">
							<?php foreach ($field['headings'] as $heading_key => $heading): ?>
								<li class="Tabs_item<?php echo $heading_key == 0 ? ' Tabs_item-active' : '' ?>" data-tab-index="<?php echo $heading_key ?>">
									<?php echo $heading['heading'] ?>
								</li>
							<?php endforeach ?>
						</ul>

						<?php if ($field['table']): ?>
							<div class="Tabs_container">
								<?php foreach ($field['headings'] as $heading_key => $heading): ?>
									<div class="Tabs_content<?php echo $heading_key == 0 ? ' Tabs_content-active' : '' ?>" data-tab-index="<?php echo $heading_key ?>">
										<?php $heading_img = wp_get_attachment_image( $heading['mobile_image'], 'full' ); ?>

										<?php if ($heading_img): ?>
											<div class="Tabs_headingImgWrapper">
												<?php echo $heading_img ?>
											</div>
										<?php endif ?>

										<?php if ($field['table']): ?>
		                  <div class="ExpandTables" id="ExpandableMobileTable<?php echo $heading_key ?>">
		                  	<?php foreach ($field['table'] as $table_key => $table): ?>
		                  		<?php
										    		$table_classes = $table['edit_mode'] == 'multiline_text' ? ' ExpandTable-description' : '';
														$td_classes = $table['edit_mode'] == 'single_line' ? ' ExpandTable_data-value' : '';
													?>

		                  		<div class="ExpandTable ExpandTable-expanded<?php echo $table_classes ?>">
												    <table class="ExpandTable_table">
												    	<?php if ($table['heading']): ?>
												    		<thead class="ExpandTable_head">
													        <tr class="ExpandTable_row">
													          <th class="ExpandTable_th" colspan="5">
													          	<a class="SwitchLink ExpandTable_switchLink" href="#">
													          		<?php echo $table['heading'] ?>
													          	</a>
													          </th>
													        </tr>
													      </thead>
												    	<?php endif ?>

												    	<?php if ($table['rows']): ?>
													      <tbody class="ExpandTable_body">
													      	<?php foreach ($table['rows'] as $row_index => $row): ?>
													      		<tr class="ExpandTable_row">
													      			<?php if ($row['display_label'] == 'yes' && $row['row_label']): ?>
													      				<td class="ExpandTable_data ExpandTable_data-label">
													      					<?php if (($row['display_label_hint'] == 'yes' && $row['hint']['title']) || ($row['display_label_hint'] == 'yes' && $row['hint']['text'])): ?>
													      					<div class="ExpandTable_labelWrapper">
													      						<div class="ExpandTable_label">
													      							<?php echo $row['row_label'] ?>
													      						</div>

													      						<div class="Hint Hint-expandTable">
													      							<a class="Hint_icon" href="#"></a>
													      							<div class="Hint_wrapper">
													      								<?php if ($row['hint']['title']): ?>
													      									<h5 class="Hint_title">
													      										<?php echo $row['hint']['title'] ?>
													      									</h5>
													      								<?php endif ?>

													      								<?php if ($row['hint']['text']): ?>
													      									<div class="Hint_text">
													      										<?php echo $row['hint']['text'] ?>
													      									</div>
													      								<?php endif ?>
													      							</div>
													      						</div>
													      					</div>
													      				<?php else: ?>
													      					<div class="ExpandTable_label">
													      						<?php echo $row['row_label'] ?>
													      					</div>
													      				<?php endif ?>
													      			</td>
													      		<?php endif ?>

														        	<?php if ($row['cols']): ?>
															          <td class="ExpandTable_data<?php echo $td_classes ?>">
															          	<?php
															          		$column_value = $table['edit_mode'] == 'multiline_text' ? $row['cols'][$heading_key]['data_multiline'] : $row['cols'][$heading_key]['data'];
															          	?>

															            <?php echo $column_value ?>
															          </td>
														        	<?php endif ?>
														        </tr>
													      	<?php endforeach ?>
													      </tbody>
												    	<?php endif ?>
												    </table>
												  </div>
		                  	<?php endforeach ?>	                    
		                  </div>
										<?php endif ?>
									</div>
								<?php endforeach ?>
							</div>
						<?php endif ?>
					</div>
				<?php endif ?>

				<div class="ExpandTables hidden-smMinus" id="ExpandableTablesAll">
					<?php if ($field['headings']): ?>
						<div class="ExpandTable ExpandTable-titles">
	            <table class="ExpandTable_table">
	              <tbody class="ExpandTable_body">
	                <tr class="ExpandTable_row">
	                  <td class="ExpandTable_data"></td>
	                  <?php foreach ($field['headings'] as $heading): ?>
		                  <td class="ExpandTable_data">
		                    <div class="ExpandTable_colTitle">
		                    	<?php echo $heading['heading'] ?>
		                    </div>
		                  </td>
	                  <?php endforeach ?>
	                </tr>
	              </tbody>
	            </table>
	          </div>
					<?php endif ?>

					<?php foreach ($field['table'] as $table): ?>
			    	<?php
			    		$table_classes = $table['edit_mode'] == 'multiline_text' ? ' ExpandTable-description' : '';
							$td_classes = $table['edit_mode'] == 'single_line' ? ' ExpandTable_data-value' : '';
						?>

					  <div class="ExpandTable ExpandTable-expanded<?php echo $table_classes ?>">
					    <table class="ExpandTable_table">
					    	<?php if ($table['heading']): ?>
					    		<thead class="ExpandTable_head">
						        <tr class="ExpandTable_row">
						          <th class="ExpandTable_th" colspan="5">
						          	<a class="SwitchLink ExpandTable_switchLink" href="#">
						          		<?php echo $table['heading'] ?>
						          	</a>
						          </th>
						        </tr>
						      </thead>
					    	<?php endif ?>

					    	<?php if ($table['rows']): ?>
						      <tbody class="ExpandTable_body">
						      	<?php foreach ($table['rows'] as $row): ?>
						      		<tr class="ExpandTable_row">
						      			<td class="ExpandTable_data ExpandTable_data-label">
						      				<?php if ($row['display_label'] == 'yes' && $row['row_label']): ?>
						      					<?php if (($row['display_label_hint'] == 'yes' && $row['hint']['title']) || ($row['display_label_hint'] == 'yes' && $row['hint']['text'])): ?>
						      					<div class="ExpandTable_labelWrapper">
						      						<div class="ExpandTable_label">
						      							<?php echo $row['row_label'] ?>
						      						</div>

						      						<div class="Hint Hint-expandTable">
						      							<a class="Hint_icon" href="#"></a>
						      							<div class="Hint_wrapper">
						      								<?php if ($row['hint']['title']): ?>
						      									<h5 class="Hint_title">
						      										<?php echo $row['hint']['title'] ?>
						      									</h5>
						      								<?php endif ?>

						      								<?php if ($row['hint']['text']): ?>
						      									<div class="Hint_text">
						      										<?php echo $row['hint']['text'] ?>
						      									</div>
						      								<?php endif ?>
						      							</div>
						      						</div>
						      					</div>
						      				<?php else: ?>
						      					<div class="ExpandTable_label">
						      						<?php echo $row['row_label'] ?>
						      					</div>
						      				<?php endif ?>
						      			<?php endif ?>
						      		</td>

							        	<?php if ($row['cols']): ?>
							        		<?php foreach ($row['cols'] as $column): ?>
									          <td class="ExpandTable_data<?php echo $td_classes ?>">
									          	<?php
									          		$column_value = $table['edit_mode'] == 'multiline_text' ? $column['data_multiline'] : $column['data'];
									          	?>

									            <?php echo $column_value ?>
									          </td>
							        		<?php endforeach ?>
							        	<?php endif ?>
							        </tr>
						      	<?php endforeach ?>
						      </tbody>
					    	<?php endif ?>
					    </table>
					  </div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>