@extends('layouts.main-layout')

@section('content')
    <script src="{{ asset('js/OrgChart.js') }}"></script>

    <div id="tree" class="genealogy-tree"></div>

    <script>
        $(document).ready(function () {
            OrgChart.templates.ana.link = '<path stroke-linejoin="round" stroke="#9CC3D5FF" stroke-width="1px" fill="none" d="{edge}" />';
            OrgChart.templates.male = Object.assign({}, OrgChart.templates.ana);
            OrgChart.templates.male.size = [200, 277];
            OrgChart.templates.male.node =
                '<rect x="0" y="0" rx="5" ry="5" height="250" width="200" fill="#5F4B8BFF" stroke-width="0" stroke="#6e2e2a"></rect>' +
                '<circle cx="100" cy="55" fill="#c4c4c4" r="35" stroke="#757575" stroke-width="0.5"></circle>';

            OrgChart.templates.male.firstname = '<text width="160" style="font-size: 22px;" fill="#ffffff" x="100" y="135" text-anchor="middle" font-weight="bold">{val}</text>';
            OrgChart.templates.male.lastname = '<text width="160" style="font-size: 22px;" fill="#ffffff" x="100" y="165" text-anchor="middle" font-weight="bold">{val}</text>';
            OrgChart.templates.male.birthday = '<text width="160" style="font-size: 14px;" fill="#ffffff" x="100" y="205" text-anchor="middle" font-weight="bold">{val}</text>';

            OrgChart.templates.male.img =
                '<clipPath id="{randId}"><circle  cx="100" cy="55" r="35"></circle></clipPath>' +
                '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="60" y="15"  width="80" height="80"></image>';

            OrgChart.templates.male.nodeMenuButton = '<g style="cursor:pointer;" transform="matrix(1,0,0,1,270,5)" control-node-menu-id="{id}">' +
                '<rect x="-105" y="0" fill="red" fill-opacity="0" width="22" height="22"></rect>' +
                '<circle cx="-100" cy="15" r="2.5" fill="#4f130b"></circle><circle cx="-93" cy="15" r="2.5" fill="#4f130b"></circle><circle cx="-86" cy="15" r="2.5" fill="#4f130b"></circle></g>';

            OrgChart.templates.male.minus = '<circle cx="15" cy="-13" r="15" fill="#fafafa" stroke="#aeaeae" stroke-width="1"></circle>'
                + '<line x1="5" y1="-13" x2="25" y2="-13" stroke-width="1" stroke="#4f130b"></line>';
            OrgChart.templates.male.plus = '<circle cx="15" cy="-13" r="15" fill="#fafafa" stroke="#aeaeae" stroke-width="1"></circle>'
                + '<line x1="5" y1="-13" x2="25" y2="-13" stroke-width="1" stroke="#4f130b"></line>'
                + '<line x1="15" y1="-23" x2="15" y2="-3" stroke-width="1" stroke="#4f130b"></line>';

            OrgChart.templates.male.linkAdjuster = {
                fromX: 0,
                fromY: 0,
                toX: 0,
                toY: -13
            }

            OrgChart.templates.female = Object.assign({}, OrgChart.templates.ana);
            OrgChart.templates.female.size = [200, 277];
            OrgChart.templates.female.node =
                '<rect x="0" y="0" rx="5" ry="5" height="250" width="200" fill="#E69A8DFF" stroke-width="0" stroke="#6b84c7"></rect>' +
                '<circle cx="100" cy="55" fill="#c4c4c4" r="35" stroke="#757575" stroke-width="0.5"></circle>';

            OrgChart.templates.female.firstname = '<text width="160" style="font-size: 22px;" fill="#ffffff" x="100" y="135" text-anchor="middle" font-weight="bold">{val}</text>';
            OrgChart.templates.female.lastname = '<text width="160" style="font-size: 22px;" fill="#ffffff" x="100" y="165" text-anchor="middle" font-weight="bold">{val}</text>';
            OrgChart.templates.female.birthday = '<text width="160" style="font-size: 14px;" fill="#ffffff" x="100" y="205" text-anchor="middle" font-weight="bold">{val}</text>';

            OrgChart.templates.female.img =
                '<clipPath id="{randId}"><circle  cx="100" cy="55" r="35"></circle></clipPath>' +
                '<image preserveAspectRatio="xMidYMid slice" clip-path="url(#{randId})" xlink:href="{val}" x="60" y="15"  width="80" height="80"></image>';

            OrgChart.templates.female.nodeMenuButton = '<g style="cursor:pointer;" transform="matrix(1,0,0,1,270,5)" control-node-menu-id="{id}">' +
                '<rect x="-105" y="0" fill="red" fill-opacity="0" width="22" height="22"></rect>' +
                '<circle cx="-100" cy="15" r="2.5" fill="#4f130b"></circle><circle cx="-93" cy="15" r="2.5" fill="#4f130b"></circle><circle cx="-86" cy="15" r="2.5" fill="#4f130b"></circle></g>';

            OrgChart.templates.female.minus = '<circle cx="15" cy="-13" r="15" fill="#fafafa" stroke="#aeaeae" stroke-width="1"></circle>'
                + '<line x1="5" y1="-13" x2="25" y2="-13" stroke-width="1" stroke="#4f130b"></line>';
            OrgChart.templates.female.plus = '<circle cx="15" cy="-13" r="15" fill="#fafafa" stroke="#aeaeae" stroke-width="1"></circle>'
                + '<line x1="5" y1="-13" x2="25" y2="-13" stroke-width="1" stroke="#4f130b"></line>'
                + '<line x1="15" y1="-23" x2="15" y2="-3" stroke-width="1" stroke="#4f130b"></line>';

            OrgChart.templates.female.linkAdjuster = {
                fromX: 0,
                fromY: 0,
                toX: 0,
                toY: -13
            }

            var chart = new OrgChart(document.getElementById("tree"), {
                toolbar: {
                    layout: true,
                    zoom: true,
                    fit: true,
                    expandAll: false
                },
                tags: {
                    male: {
                        template: 'male'
                    },
                    female: {
                        template: 'female'
                    }
                },
                template: "male",
                nodeBinding: {
                    firstname: "firstname",
                    lastname: "lastname",
                    birthday: "birthday",
                    img: "img"
                },
            });

            $.ajax({
                url: '{{ route('ajax.resource-tree') }}',
                method: 'get',
                success: function (data) {
                    let nodeData = _.map(data, item => {
                        // let obj = {
                        //     id: item.id,
                        //     pid: _.get(item, 'parent.father_id') || _.get(item, 'parent.mother_id'),
                        //     birthday: item.birthday,
                        //     img: 'images/male.jpg',
                        // }

                        item['pid'] = _.get(item, 'parent.father_id') || _.get(item, 'parent.mother_id');
                        item['img'] = 'images/male.jpg';

                        if (item['gender'] === 'female') {
                            item['tags'] = ['female'];
                            item['img'] = 'images/female.jpg';
                        }

                        return item;
                    });

                    chart.load(nodeData);
                }
            })
        })
    </script>
@endsection
