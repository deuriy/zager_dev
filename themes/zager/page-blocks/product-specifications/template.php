<?php if ($field['title'] || $field['specifications_list'] || $field['characteristics_list']): ?>
	<div class="Specifications Tabs_specifications">
		<?php if ($field['title']): ?>
			<h2 class="SectionTitle SectionTitle-specifications Specifications_title">
				<?php echo $field['title']; ?>
			</h2>
		<?php endif ?>

		<?php if ($field['specifications_list']): ?>
			<div class="Specifications_groups">
				<?php foreach ($field['specifications_list'] as $specifications_group): ?>
					<?php
					$taxonomy_slug = 'pa_' . $specifications_group;
					$specifications = get_terms( [
						'taxonomy' => $taxonomy_slug,
						'hide_empty' => false
					]);
					$specifications_group_title = get_taxonomy($taxonomy_slug)->labels->singular_name;
					?>

					<?php if ($specifications || $specifications_group_title): ?>
						<div class="SpecificationsGroup Specifications_group">
							<?php if ($specifications_group_title): ?>
								<h3 class="SpecificationsGroup_title">
									<?php echo $specifications_group_title; ?>
								</h3>
							<?php endif ?>
							
							<div class="SpecificationsGroup_items">
								<?php foreach ($specifications as $specification): ?>
									<?php
									$term_slug = $taxonomy_slug . '_' . $specification->term_id;
									$icon_id = get_field('icon', $term_slug);
									$specification_icon = wp_get_attachment_image( $icon_id, 'full', false, array('class' => 'Specification_icon') );
									$characteristics = get_field('characteristics', $term_slug);
									$spec_classes = $characteristics ? ' Specification-extended' : '';
									?>

									<div class="Specification<?php echo $spec_classes; ?> SpecificationsGroup_item">
										<?php if ($specification_icon): ?>
											<div class="Specification_iconWrapper">
												<?php echo $specification_icon; ?>
											</div>
										<?php endif ?>
										
										<?php if ($specification->name): ?>
											<h4 class="Specification_title">
												<?php echo $specification->name; ?>
											</h4>
										<?php endif ?>

										<?php if ($specification->description): ?>
											<div class="Specification_text">
												<?php echo $specification->description; ?>
											</div>
										<?php endif ?>

										<?php if ($characteristics): ?>
											<ul class="Specification_characteristics">
												<?php foreach ($characteristics as $characteristic): ?>
													<li class="Specification_characteristic">
														<?php echo $characteristic['name'] . ': ' . $characteristic['value']; ?>
													</li>
												<?php endforeach ?>
											</ul>
										<?php endif ?>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		<?php endif ?>

		<?php if ($field['characteristics_list']): ?>
			<div class="Characteristics Specifications_characteristics">
				<div class="Characteristics_groups">
					<?php foreach ($field['characteristics_list'] as $characteristics_group): ?>
						<?php
						$taxonomy_slug = 'pa_' . $characteristics_group;
						$characteristics = get_terms( [
							'taxonomy' => $taxonomy_slug,
							'hide_empty' => false
						]);
						$characteristics_group_title = get_taxonomy($taxonomy_slug)->labels->singular_name;
						?>

						<?php if (!empty($characteristics)): ?>
							<div class="CharacteristicsGroup Characteristics_group">
								<?php if ($characteristics_group_title): ?>
									<h3 class="CharacteristicsGroup_title">
										<?php echo $characteristics_group_title; ?>
									</h3>
								<?php endif ?>

								<div class="CharacteristicsGroup_items">
									<?php foreach ($characteristics as $characteristic): ?>
										<div class="Characteristic CharacteristicsGroup_item">
											<?php if ($characteristic->name): ?>
												<div class="Characteristic_name">
													<?php echo $characteristic->name; ?>
												</div>
											<?php endif ?>

											<?php if ($characteristic->description): ?>
												<div class="Characteristic_value">
													<?php echo $characteristic->description; ?>
												</div>
											<?php endif ?>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						<?php endif ?>
						
					<?php endforeach ?>
				</div>
			</div>
		<?php endif ?>
	</div>
	<?php endif ?>