@extends('layouts.main-layout')

@section('content')
    <div class="chart" id="genealogy-diagram"></div>

    <script src="{{ asset('js/tree-diagram.js') }}"></script>
    <script>
        $.ajax({
            url: '{{ route('ajax.resource-tree') }}',
            method: 'get',
            success: function (data) {
                let listData = _.map(data, item => ({
                    id: item.id,
                    parent: _.get(item, 'parent.father_id'),
                    text: {
                        name: item.name
                    },
                    image: 'images/dummy.jpg',
                    children: []
                }));

                _.forEach(listData, item => {
                    if (item.parent) {
                        listData[item.parent - 1].children.push(item);
                    }
                })

                let root = _.find(listData, item => !item.parent);

                new Treant(chart_config(root));
            }
        })
    </script>
@endsection
