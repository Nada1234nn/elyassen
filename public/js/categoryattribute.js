$(document).ready(function () {

    // Add Product page
    $('form').on('click', '.removeItem', function () {
        $(this).closest('.item').remove();
    });

    $('form').on('click', '.deleteItemGroup', function () {
        $(this).closest('.itemsContainer').remove();
    });

    $('form').on('click', '.addItemsGroup', function () {
        var _clone = $(this).closest('.itemsGroupsContainer').find('.itemsContainer').last().clone();
        var group_key = Date.now();
        _clone.find('input:hidden').first().val('').attr('name', 'group[' + group_key + '][attribute]').attr('data-key', group_key);
        var i = 0;
        _clone.find('input.group_id').first().val('').attr('name', 'group[' + group_key + '][group_id]').attr('data-key', group_key);
        _clone.find('input.attribute').first().val('').attr('name', 'group[' + group_key + '][attribute]').attr('data-key', group_key);
        _clone.find('input.text').val('').attr('name', 'group[' + group_key + '][attribute_key][0]');
        _clone.find('input.key').val('').attr('name', 'group[' + group_key + '][attribute_key][1]');

        // _clone.find('input:text').first().val('').attr('name', 'group[' + group_key_1 + '][attribute_key][1]');
        var _container = $(this).closest('.itemsGroupsContainer');
        _clone.find('.item:not(:first)').remove();
        _container.find('.itemsContainer').last().after(_clone);

    });
    $('form').on('click', '.addItem', function () {
        var _clone = $(this).closest('.itemsContainer').find('.item').last().clone();
        var group_key = $(this).closest('.itemsContainer').find('input').first().attr('data-key');
        var row_key = Date.now();

        _clone.find('input.key').val('').attr('name', 'group[' + group_key + '][attribute_key][' + row_key + ']');
        var _container = $(this).closest('.itemsContainer');
        _clone.removeClass('hidden');
        $(this).closest('.itemsContainer').find('.item').last().after(_clone);
    });
    // adding new group or item in edit
    $('form').on('click', '.addItemsGroup_edit', function () {
        var _clone = $(this).closest('.itemsGroupsContainer').find('.itemsContainer').last().clone();
        var group_key = Date.now();
        _clone.find('input:text').first().val('').attr('name', 'group[' + group_key + '][attribute]').attr('data-key', group_key);
        _clone.find('input.key').first().val('').attr('name', 'group[' + group_key + '][attribute_key][0]');
        _clone.find('a.destroyItem').removeAttr('onclick object_id delete_url');
        _clone.find('a.destroyItemGroup').removeAttr('onclick object_id delete_url');
        _clone.find('a.destroyItem').addClass('removeItem');
        _clone.find('a.destroyItem').removeClass('destroyItem');
        _clone.find('a.destroyItemGroup').addClass('deleteItemGroup');
        _clone.find('a.destroyItemGroup').removeClass('destroyItemGroup');

        var _container = $(this).closest('.itemsGroupsContainer');
        _clone.find('.item:not(:first)').remove();
        _container.find('.itemsContainer').last().after(_clone);
    });
    $('form').on('click', '.addItem_edit', function () {
        var _clone = $(this).closest('.itemsContainer').find('.item').last().clone();
        var group_key = $(this).closest('.itemsContainer').find('input').first().attr('data-key');
        var row_key = Date.now();

        _clone.find('input.key').val('').attr('name', 'group[' + group_key + '][attribute_key][' + row_key + ']');
        _clone.find('a.destroyItem').removeAttr('onclick object_id delete_url');
        _clone.find('a.destroyItem').addClass('removeItem');
        _clone.find('a.destroyItem').removeClass('destroyItem');
        var _container = $(this).closest('.itemsContainer');
        _clone.removeClass('hidden');
        $(this).closest('.itemsContainer').find('.item').last().after(_clone);
    });

});