<?php echo theme_partial('header'); ?>

<div id="content">
    <div class="breadcrumb"><?php echo isset($breadcrumb) ? $breadcrumb : ''; ?></div>
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo validation_errors(); ?>


    <?php if (isset($grid) && $grid) { ?>
        <div class="box">
            <div class="heading">
                <h1><?php if(isset($grid_icon_src)) { ?><img alt="" src="<?php echo $grid_icon_src ?>"><?php } ?><?php echo isset($grid_title) ? $grid_title : '' ?> </h1>

                <?php if (isset($buttons) && !empty($buttons)) { ?>
                    <div class="buttons">
                        <?php foreach ($buttons as $button) { ?>
                            <a class="button <?php echo isset($button['class']) ? $button['class'] : '' ?>" href="<?php echo isset($button['url']) ? $button['url'] : '#' ?>"><span><?php echo isset($button['label']) ? $button['label'] : '' ?></span></a>
                        <?php } ?>    
                    </div>
                <?php } ?>
            </div>
            <div class="content">
                <?php if (isset($filters) && !empty($filters)) { ?>
                    <form id="filter_form" method="post">
                        <table class="list">
                            <thead>
                                <tr>
                                    <?php foreach ($filters as $filter) { ?>
                                        <th>
                                            <?php if (isset($filter['options']) && is_array($filter['options'])) { ?>
                                                <select name="<?php echo isset($filter['field']) ? $filter['field'] : '' ?>" id="<?php echo isset($filter['field']) ? $filter['field'] : '' ?>">
                                                    <?php if (isset($filter['options'])) { ?>
                                                        <?php foreach ($filter['options'] as $key => $value) { ?>
                                                            <option value="<?php echo $key ?>" <?php echo isset($params[$filter['field']]) && $params[$filter['field']] == $key ? 'selected="selected"' : ''; ?>><?php echo $value ?></option>
                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            <?php } else { ?>
                                                <input type="text" name="<?php echo isset($filter['field']) ? $filter['field'] : '' ?>" id="<?php echo isset($filter['field']) ? $filter['field'] : '' ?>" placeholder="<?php echo $filter['label'] ?>" value="<?php echo isset($params[$filter['field']]) ? $params[$filter['field']] : ''; ?>"/>
                                            <?php } ?>
                                        </th>
                                    <?php } ?>
                                    <th>
                                        <button type="submit" class="button"><span>Filter</span></button>
                                        <button type="button" class="button" onclick="window.location.href = '?reset=true'"><span>Clear</span></button>
                                    </th>
                                </tr>
                            </thead>
                        </table>
                    </form>
                <?php } ?>
                <?php echo form_open(null, 'id="grid_form"'); ?>
            <?php } ?>
            <?php echo $content; ?>
            <?php if (isset($grid) && $grid) { ?>
                <?php echo form_close(); ?>
                <?php if (isset($data->paged)) { ?>
                    <div class="pagination">
                        <div class="links"><?php echo $this->pagination->create_links(); ?></div>
                        <div class="results">Showing <?php echo ($data->exists()) ? $data->paged->current_row + 1 : 0; ?> to <?php echo $data->paged->current_row + $data->paged->items_on_page; ?> of <?php echo $data->paged->total_rows; ?> (<?php echo $data->paged->total_pages; ?>  Pages)</div>
                    </div>
                <?php } else { ?>
                    <div class="pagination">
                        <div class="links"><?php echo $this->pagination->create_links(); ?></div>
                        <div class="results">Showing <?php echo ($data) ? $limit + 1 : 0; ?> to <?php echo $limit + count($data); ?> of <?php echo $this->pagination->total_rows; ?> (<?php echo ceil($this->pagination->total_rows / $this->pagination->per_page); ?>  Pages)</div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                function deleteId() {
                    var deleteCheck = [];
                    $("input[name='selected[]']").each(function() {
                        if (($(this).is(':checked')) && ($(this).val())) {
                            deleteCheck.push($(this).val());
                        }
                    });
                    return deleteCheck;
                }
                $('.delete').click(function(e) {
                    e.preventDefault();
                    if (deleteId().length != 0) {
                        if (confirm('Delete cannot be undone! Are you sure you want to do this?')) {
                            $('#grid_form').attr('action', $(this).attr('href')).submit()
                        }
                    } else {
                        return false;
                    }
                });
    <?php if (isset($grid_url)) { ?>
                    $('.sortable').click(function() {
                        sort = $(this);

                        if (sort.hasClass('asc'))
                        {
                            window.location.href = "<?php echo $grid_url . '?search=' . $this->input->get('search') . '&group_id=' . $this->input->get('group_id'); ?>&sort=" + sort.attr('rel') + "&order=desc";
                        }
                        else
                        {
                            window.location.href = "<?php echo $grid_url . '?search=' . $this->input->get('search') . '&group_id=' . $this->input->get('group_id'); ?>&sort=" + sort.attr('rel') + "&order=asc";
                        }

                        return false;
                    });

        <?php if ($sort = $this->input->get('sort')): ?>
                        $('a.sortable[rel="<?php echo $sort; ?>"]').addClass('<?php echo ($this->input->get('order')) ? $this->input->get('order') : 'asc' ?>');
        <?php else: ?>
                        $('a.sortable[rel="last_name"]').addClass('asc');
        <?php endif; ?>
    <?php } ?>
            });
        </script>
    <?php } ?>
</div>

<?php echo theme_partial('footer'); ?>
