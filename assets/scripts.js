var core = {
	items: [],

	setupCore: function () {
		core.list = $('#shoppingList')
		core.input = $('#addItem')
		core.collectList()

		core.addToList()
		core.removeFromList()
		core.crossItem()
	},
	setupList: function () {
		$.each(core.items, function (index, value) {
			core.list.append(
				'<li data-index="' +
					index +
					'"' +
					(value.checked ? 'class="crossed"' : '') +
					'><div class="list_item">' +
					value.item +
					'</div><input type="checkbox" class="crossItem"' +
					(value.checked ? 'checked' : '') +
					'></li>'
			)
		})
		core.list.sortable({
			update: function () {
				core.updateOrder(
					core.list.sortable('toArray', { attribute: 'data-index' })
				)
			},
		})
	},
	addToList: function () {
		$('#submit').on('click', function () {
			core.list.append(
				'<li><div class="list_item">' +
					core.input.val() +
					'</div><input type="checkbox" class="crossItem"></li>'
			)
			core.items.push({ item: core.input.val(), checked: false })
			core.saveList()
		})
	},
	removeFromList: function () {
		$('#shoppingList').on('click', '.list_item', function () {
			$(this).parent().remove()
			var i = $(this).parent().data('index')
			core.items.splice(i, 1)
			core.saveList()
		})
	},
	crossItem: function () {
		$('#shoppingList').on('change', '.crossItem', function () {
			if (this.checked) {
				$(this).parent().addClass('crossed')
				var i = $(this).parent().data('index')
				core.items[i].checked = true
			} else {
				$(this).parent().removeClass('crossed')
				var i = $(this).parent().data('index')
				core.items[i].checked = false
			}
			core.saveList()
		})
	},
	updateOrder: function (orderArray) {
		var newArray = []
		$.each(orderArray, function (index, value) {
			newArray.push(core.items[value])
		})
		core.items = newArray

		core.saveList()
	},
	collectList: function () {
		$.ajax({
			url: '/classes/ajax.php',
			type: 'GET',
			data: {
				method: 'getShoppingList',
			},
			dataType: 'json',
			success: function (data) {
				core.items = data
				core.setupList()
				console.log(data)
			},
			error: function (request, error) {
				console.log('Error on Request: ' + JSON.stringify(request))
			},
		})
	},
	saveList: function () {
		$.ajax({
			url: '/classes/ajax.php',
			type: 'GET',
			data: {
				method: 'saveShoppingList',
				data: JSON.stringify(core.items),
			},
			dataType: 'json',
			success: function (data) {
				console.log('saved list')
			},
			error: function (request, error) {
				console.log('Error on Request: ' + JSON.stringify(request))
			},
		})
	},
}

$(function () {
	core.setupCore()
})
