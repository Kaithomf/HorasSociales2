<?php
/**
 * Section Blog General
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
    array(
        'id'             => 'blog_general',
        'panel'			 => 'blog',
        'title'          => esc_html__( 'Settings', 'education-pack' ),
        'priority'       => 10,
    )
);

// Blog Archive Group
thim_customizer()->add_group( array(
    'id'       => 'blog_archive_setting_group',
    'section'  => 'blog_general',
    'priority' => 10,
    'groups'   => array(
        array(
            'id'     => 'blog_archive_page_group',
            'label'  => esc_html__( 'Archive Page', 'education-pack' ),
            'fields' => array(
                //Blog Columns
                array(
                    'type'        => 'select',
                    'id'          => 'archive_post_column',
                    'label'       => esc_html__( 'Blog Columns', 'education-pack' ),
                    'tooltip'     => esc_html__( 'Choose the number of columns for archive post.', 'education-pack' ),
                    'default'     => '2',
                    'priority'    => 10,
                    'multiple'    => 0,
                    'choices'     => array(
                        '1' => esc_html__( '1', 'education-pack' ),
                        '2' => esc_html__( '2', 'education-pack' ),
                        '3' => esc_html__( '3', 'education-pack' ),
                        '4' => esc_html__( '4', 'education-pack' ),
                    ),
                ),
                // Excerpt Content
                array(
                    'id'          => 'excerpt_archive_content',
                    'type'        => 'slider',
                    'label'       => esc_html__( 'Excerpt Length', 'education-pack' ),
                    'tooltip'     => esc_html__( 'Choose the number of words you want to cut from the content to be the excerpt of search and archive', 'education-pack' ),
                    'priority'    => 20,
                    'default'     => 20,
                    'choices'     => array(
                        'min'  => '10',
                        'max'  => '100',
                        'step' => '5',
                    ),
                ),
                // Turn On Excerpt
                array(
                    'type'     => 'switch',
                    'id'       => 'excerpt_archive_content_display',
                    'label'    => esc_html__( 'Display Excerpt', 'education-pack' ),
                    'tooltip'  => esc_html__( 'Turn on to display excerpt content.', 'education-pack' ),
                    'default'  => true,
                    'priority' => 21,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'education-pack' ),
                        false => esc_html__( 'Off', 'education-pack' ),
                    ),
                ),
                // Turn On Readmore
                array(
                    'type'     => 'switch',
                    'id'       => 'readmore_archive_content_display',
                    'label'    => esc_html__( 'Display Readmore', 'education-pack' ),
                    'tooltip'  => esc_html__( 'Turn on to display readmore button.', 'education-pack' ),
                    'default'  => true,
                    'priority' => 21,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'education-pack' ),
                        false => esc_html__( 'Off', 'education-pack' ),
                    ),
                ),
            ),
        ),
    )
) );

// Blog Single Group
thim_customizer()->add_group( array(
    'id'       => 'blog_single_setting_group',
    'section'  => 'blog_general',
    'priority' => 20,
    'groups'   => array(
        array(
            'id'     => 'blog_single_page_group',
            'label'  => esc_html__( 'Single Page', 'education-pack' ),
            'fields' => array(
                // Show Feature Image
                array(
                    'type'     => 'switch',
                    'id'       => 'blog_single_feature_image',
                    'label'    => esc_html__( 'Featured Image', 'education-pack' ),
                    'tooltip'  => esc_html__( 'Turn on to display featured images on single blog posts..', 'education-pack' ),
                    'default'  => true,
                    'priority' => 10,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'education-pack' ),
                        false => esc_html__( 'Off', 'education-pack' ),
                    ),
                ),
                // Turn On Navigation
                array(
                    'type'     => 'switch',
                    'id'       => 'blog_single_nav',
                    'label'    => esc_html__( 'Navigation', 'education-pack' ),
                    'tooltip'  => esc_html__( 'Turn on to display navigation.', 'education-pack' ),
                    'default'  => true,
                    'priority' => 25,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'education-pack' ),
                        false => esc_html__( 'Off', 'education-pack' ),
                    ),
                ),
                // Turn On Author
                array(
                    'type'     => 'switch',
                    'id'       => 'blog_single_author',
                    'label'    => esc_html__( 'Author', 'education-pack' ),
                    'tooltip'  => esc_html__( 'Turn on to display author.', 'education-pack' ),
                    'default'  => false,
                    'priority' => 25,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'education-pack' ),
                        false => esc_html__( 'Off', 'education-pack' ),
                    ),
                ),

                // Turn On Comments
                array(
                    'type'     => 'switch',
                    'id'       => 'blog_single_comment',
                    'label'    => esc_html__( 'Comments', 'education-pack' ),
                    'tooltip'  => esc_html__( 'Turn on to display comments.', 'education-pack' ),
                    'default'  => true,
                    'priority' => 20,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'education-pack' ),
                        false => esc_html__( 'Off', 'education-pack' ),
                    ),
                ),
                // Turn On Related Post
                array(
                    'type'     => 'switch',
                    'id'       => 'blog_single_related_post',
                    'label'    => esc_html__( 'Related Posts', 'education-pack' ),
                    'tooltip'  => esc_html__( 'Turn on to display related posts.', 'education-pack' ),
                    'default'  => false,
                    'priority' => 30,
                    'choices'  => array(
                        true  => esc_html__( 'On', 'education-pack' ),
                        false => esc_html__( 'Off', 'education-pack' ),
                    ),
                ),
                // Select Post Numbers For Related Post
                array(
                    'type'            => 'slider',
                    'id'              => 'blog_single_related_post_number',
                    'label'           => esc_html__( 'Numbers of Related Post', 'education-pack' ),
                    'default'         => 3,
                    'priority'        => 40,
                    'choices'         => array(
                        'min'  => 1,
                        'max'  => 20,
                        'step' => 1,
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'blog_single_related_post',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                ),
                // Select Post Column Numbers For Related Post
                array(
                    'type'            => 'slider',
                    'id'              => 'blog_single_related_post_column',
                    'label'           => esc_html__( 'Columns of Related Post', 'education-pack' ),
                    'default'         => 3,
                    'priority'        => 50,
                    'choices'         => array(
                        'min'  => 1,
                        'max'  => 12,
                        'step' => 1,
                    ),
                    'active_callback' => array(
                        array(
                            'setting'  => 'blog_single_related_post',
                            'operator' => '==',
                            'value'    => true,
                        ),
                    ),
                )

            ),
        ),
    )
) );
