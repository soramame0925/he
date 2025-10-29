<?php
/** @var array $values */
?>
<div class="mno-pm-meta">
    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Gallery Images', 'mno-post-manager' ); ?></h3>
        <p class="description"><?php esc_html_e( 'Add multiple images and drag to reorder.', 'mno-post-manager' ); ?></p>
        <div id="mno-pm-gallery-list" class="mno-pm-gallery">
            <?php if ( ! empty( $values['gallery'] ) ) : ?>
                <?php foreach ( $values['gallery'] as $attachment_id ) :
                    $thumb = wp_get_attachment_image( $attachment_id, 'thumbnail' );
                    ?>
                    <div class="mno-pm-gallery__item">
                        <span class="mno-pm-gallery__handle dashicons dashicons-move" aria-hidden="true"></span>
                        <div class="mno-pm-gallery__preview">
                            <?php echo $thumb ? $thumb : esc_html__( 'Image not found', 'mno-post-manager' ); ?>
                        </div>
                        <input type="hidden" name="mno_pm_gallery[]" value="<?php echo esc_attr( $attachment_id ); ?>" />
                        <button type="button" class="button mno-pm-gallery__remove" aria-label="<?php esc_attr_e( 'Remove image', 'mno-post-manager' ); ?>">&times;</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <button type="button" class="button button-secondary" id="mno-pm-add-gallery"><?php esc_html_e( 'Add images', 'mno-post-manager' ); ?></button>
        <script type="text/template" id="mno-pm-gallery-template">
            <div class="mno-pm-gallery__item">
                <span class="mno-pm-gallery__handle dashicons dashicons-move" aria-hidden="true"></span>
                <div class="mno-pm-gallery__preview">{{image}}</div>
                <input type="hidden" name="mno_pm_gallery[]" value="{{id}}" />
                <button type="button" class="button mno-pm-gallery__remove" aria-label="<?php esc_attr_e( 'Remove image', 'mno-post-manager' ); ?>">&times;</button>
            </div>
        </script>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Voice Sample', 'mno-post-manager' ); ?></h3>
        <textarea name="mno_pm_voice_sample" rows="3" class="widefat" placeholder="<?php esc_attr_e( 'Enter a URL or embed code', 'mno-post-manager' ); ?>"><?php echo esc_textarea( $values['voice_sample'] ); ?></textarea>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Circle Information', 'mno-post-manager' ); ?></h3>
        <p>
            <label>
                <?php esc_html_e( 'Circle Name', 'mno-post-manager' ); ?><br />
                <input type="text" name="mno_pm_circle_name" class="widefat" value="<?php echo esc_attr( $values['circle_name'] ); ?>" />
            </label>
        </p>
        <p>
            <label>
                <?php esc_html_e( 'Release Date', 'mno-post-manager' ); ?><br />
                <input type="date" name="mno_pm_release_date" value="<?php echo esc_attr( $values['release_date'] ); ?>" />
            </label>
        </p>
        <p>
            <label>
                <?php esc_html_e( 'Genre', 'mno-post-manager' ); ?><br />
                <input type="text" name="mno_pm_genre" class="widefat" value="<?php echo esc_attr( $values['genre'] ); ?>" />
            </label>
        </p>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Voice Actors', 'mno-post-manager' ); ?></h3>
        <div class="mno-pm-repeater" data-name="mno_pm_voice_actors">
            <div class="mno-pm-repeater__rows">
                <?php if ( ! empty( $values['voice_actors'] ) ) : ?>
                    <?php foreach ( $values['voice_actors'] as $voice_actor ) : ?>
                        <div class="mno-pm-repeater__row">
                            <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                            <input type="text" name="mno_pm_voice_actors[]" class="widefat" value="<?php echo esc_attr( $voice_actor ); ?>" />
                            <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <script type="text/template" class="mno-pm-repeater__template">
                <div class="mno-pm-repeater__row">
                    <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                    <input type="text" name="mno_pm_voice_actors[]" class="widefat" value="" />
                    <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                </div>
            </script>
            <button type="button" class="button mno-pm-repeater__add"><?php esc_html_e( 'Add voice actor', 'mno-post-manager' ); ?></button>
        </div>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Illustrators', 'mno-post-manager' ); ?></h3>
        <div class="mno-pm-repeater" data-name="mno_pm_illustrators">
            <div class="mno-pm-repeater__rows">
                <?php if ( ! empty( $values['illustrators'] ) ) : ?>
                    <?php foreach ( $values['illustrators'] as $illustrator ) : ?>
                        <div class="mno-pm-repeater__row">
                            <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                            <input type="text" name="mno_pm_illustrators[]" class="widefat" value="<?php echo esc_attr( $illustrator ); ?>" />
                            <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <script type="text/template" class="mno-pm-repeater__template">
                <div class="mno-pm-repeater__row">
                    <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                    <input type="text" name="mno_pm_illustrators[]" class="widefat" value="" />
                    <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                </div>
            </script>
            <button type="button" class="button mno-pm-repeater__add"><?php esc_html_e( 'Add illustrator', 'mno-post-manager' ); ?></button>
        </div>
    </section>

    <section class="mno-pm-meta__section mno-pm-meta__section--grid">
        <div>
            <h3><?php esc_html_e( 'Normal Price', 'mno-post-manager' ); ?></h3>
            <input type="text" name="mno_pm_normal_price" class="widefat" value="<?php echo esc_attr( $values['normal_price'] ); ?>" placeholder="<?php esc_attr_e( 'e.g. 1,320円', 'mno-post-manager' ); ?>" />
        </div>
        <div>
            <h3><?php esc_html_e( 'Sale Price', 'mno-post-manager' ); ?></h3>
            <input type="text" name="mno_pm_sale_price" class="widefat" value="<?php echo esc_attr( $values['sale_price'] ); ?>" placeholder="<?php esc_attr_e( 'Leave blank if not on sale', 'mno-post-manager' ); ?>" />
        </div>
        <div>
            <h3><?php esc_html_e( 'Sale End Date', 'mno-post-manager' ); ?></h3>
            <input type="date" name="mno_pm_sale_end_date" value="<?php echo esc_attr( $values['sale_end_date'] ); ?>" />
            <p class="description"><?php esc_html_e( 'Sale price will automatically reset after this date.', 'mno-post-manager' ); ?></p>
        </div>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Highlights', 'mno-post-manager' ); ?></h3>
        <div class="mno-pm-repeater mno-pm-repeater--textarea" data-name="mno_pm_highlights">
            <div class="mno-pm-repeater__rows">
                <?php if ( ! empty( $values['highlights'] ) ) : ?>
                    <?php foreach ( $values['highlights'] as $highlight ) : ?>
                        <div class="mno-pm-repeater__row">
                            <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                            <textarea name="mno_pm_highlights[]" class="widefat" rows="3"><?php echo esc_textarea( $highlight ); ?></textarea>
                            <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <script type="text/template" class="mno-pm-repeater__template">
                <div class="mno-pm-repeater__row">
                    <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                    <textarea name="mno_pm_highlights[]" class="widefat" rows="3"></textarea>
                    <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                </div>
            </script>
            <button type="button" class="button mno-pm-repeater__add"><?php esc_html_e( 'Add highlight', 'mno-post-manager' ); ?></button>
        </div>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Track List', 'mno-post-manager' ); ?></h3>
        <div class="mno-pm-repeater" data-name="mno_pm_track_list">
            <div class="mno-pm-repeater__rows">
                <?php if ( ! empty( $values['track_list'] ) ) : ?>
                    <?php foreach ( $values['track_list'] as $track ) : ?>
                        <div class="mno-pm-repeater__row">
                            <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                            <input type="text" name="mno_pm_track_list[]" class="widefat" value="<?php echo esc_attr( $track ); ?>" />
                            <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <script type="text/template" class="mno-pm-repeater__template">
                <div class="mno-pm-repeater__row">
                    <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                    <input type="text" name="mno_pm_track_list[]" class="widefat" value="" />
                    <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                </div>
            </script>
            <button type="button" class="button mno-pm-repeater__add"><?php esc_html_e( 'Add track', 'mno-post-manager' ); ?></button>
        </div>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Sample Lines', 'mno-post-manager' ); ?></h3>
        <div class="mno-pm-repeater mno-pm-repeater--textarea" data-name="mno_pm_sample_lines">
            <div class="mno-pm-repeater__rows">
                <?php if ( ! empty( $values['sample_lines'] ) ) : ?>
                    <?php foreach ( $values['sample_lines'] as $sample_line ) : ?>
                        <div class="mno-pm-repeater__row">
                            <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                            <textarea name="mno_pm_sample_lines[]" class="widefat" rows="3"><?php echo esc_textarea( $sample_line ); ?></textarea>
                            <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <script type="text/template" class="mno-pm-repeater__template">
                <div class="mno-pm-repeater__row">
                    <span class="dashicons dashicons-move mno-pm-repeater__handle" aria-hidden="true"></span>
                    <textarea name="mno_pm_sample_lines[]" class="widefat" rows="3"></textarea>
                    <button type="button" class="button mno-pm-repeater__remove" aria-label="<?php esc_attr_e( 'Remove', 'mno-post-manager' ); ?>">&minus;</button>
                </div>
            </script>
            <button type="button" class="button mno-pm-repeater__add"><?php esc_html_e( 'Add sample line', 'mno-post-manager' ); ?></button>
        </div>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Track Summary', 'mno-post-manager' ); ?></h3>
        <p>
            <label>
                <?php esc_html_e( 'Total Track Time', 'mno-post-manager' ); ?><br />
                <input type="text" name="mno_pm_track_duration" class="widefat" value="<?php echo esc_attr( $values['track_duration'] ); ?>" placeholder="<?php esc_attr_e( 'e.g. 45分20秒', 'mno-post-manager' ); ?>" />
            </label>
        </p>
    </section>

    <section class="mno-pm-meta__section">
        <h3><?php esc_html_e( 'Purchase Button URL', 'mno-post-manager' ); ?></h3>
        <input type="url" name="mno_pm_buy_url" class="widefat" value="<?php echo esc_attr( $values['buy_url'] ); ?>" placeholder="<?php esc_attr_e( 'https://www.dlsite.com/...', 'mno-post-manager' ); ?>" />
    </section>
</div>
