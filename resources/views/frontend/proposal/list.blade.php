@extends('frontend.users.master')
@section('page_title', 'Proposals')
@section('css_links')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href=" https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
@endsection

@section('content')
    <!--Container Main start-->
    @if (Session::has('msg'))
    <div class="alert alert-success">
        <ul>
            <li>{{ Session::get('msg') }}</li>
        </ul>
    </div>
@endif
    <div class="bg-gray p-4">
        <div class="d-flex justify-content-between align-items-center page-title-box">
            <h4 class="page-title stock"><svg xmlns="http://www.w3.org/2000/svg" width="26" height="22" viewBox="0 0 26 22" fill="none">
                    <path d="M16 4.33333C16 4.33333 16 1 12.6667 1C9.33333 1 9.33333 4.33333 9.33333 4.33333M23.5 11.8333V21H1.83333V11.8333H23.5ZM1 4.33333H24.3333V11C24.3333 11 19.3333 14.3333 12.6667 14.3333C6 14.3333 1 11 1 11V4.33333ZM12.6667 16V12.6667V16Z" stroke="#085588" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> Proposals</h4>
            <div class="float-end"><span class="d-none d-lg-inline">Proposals used:</span> <span class="green-clr h4 ms-3">07/10</span> <span><a class="blue-clr ms-4 d-none d-lg-inline" href="#">BUY MORE</a></span></div>
        </div>
        <div class="row text-center mt-5 mb-5">
            <table border="0" cellspacing="5" cellpadding="5">
                <tbody><tr>
                    <td>Minimum date:</td>
                    <td><input type="text" id="min" name="min" ></td>
                </tr>
                <tr>
                    <td>Maximum date:</td>
                    <td><input type="text" id="max" name="max" ></td>
                </tr>
                </tbody>
            </table>
            <table id="filtertable" border="0" cellspacing="5" cellpadding="5">
            </table>
            <table id="proposal_list_table" class="table-responsive table">
                <thead>
                <tr class="no-bg">
                    <th width="8%" scope="col">PNO</th>
                    <th width="22%" scope="col">Company Name</th>
                    <th width="15%" scope="col">Status</th>
                    <th width="10%" scope="col">Type</th>
                    <th width="15%" scope="col">Date</th>
                    <th width="30%" align="right" scope="col" class="text-end">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                ?>
                @foreach ($proposals  as $proposal)
                    <tr>
                        <td data-label="PNO">
                            123
                        </td>
                        <td data-label="Company Name">
                            {{ $proposal->client->name }}
                        </td>
                        <td data-label="Status"
                        class="
                        @if($proposal->status == 'Sent/Waiting'){{'green-clr'}}
                        @elseif($proposal->status == 'Modification'){{'blue-clr'}}
                        @elseif($proposal->status == 'Accepted'){{'blue-clr'}}
                        @elseif($proposal->status == 'Rejected'){{'red-clr'}}
                        @endif"
                        >
                            {{ $proposal->status }}
                            @if($proposal->status == 'Accepted')
                            <i class="fas fa-check"></i>
                            @elseif($proposal->status == 'Rejected')
                            <i class="fas fa-times"></i>
                            @endif

                        </td>
                        <td data-label="Type">
                            {{ $proposal->type }}
                        </td>
                        <td>
                            {{ $proposal->updated_at->format('d-m-y') }}
                        </td>
                        <td data-label="Actions" class="text-end action-bar">
                            <a href="@if($proposal->status == 'Accepted') contractshow/{{$proposal->id}} @else preview/{{$proposal->id}} @endif" class="table-btn view px-3 py-1">VIEW/SEND</a> <a href="{{ url('proposal/show/edit').'/'.$proposal->id }}" class="table-btn edit p-1"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M10.5386 2.8413L12.1582 4.4602M11.5801 1.41511L7.20061 5.79462C6.97432 6.02059 6.81999 6.3085 6.75707 6.62204L6.35254 8.647L8.3775 8.24171C8.69103 8.179 8.97857 8.02529 9.20492 7.79894L13.5844 3.41942C13.716 3.28782 13.8204 3.13158 13.8917 2.95963C13.9629 2.78768 13.9995 2.60338 13.9995 2.41726C13.9995 2.23115 13.9629 2.04685 13.8917 1.8749C13.8204 1.70295 13.716 1.54671 13.5844 1.41511C13.4528 1.2835 13.2966 1.17911 13.1246 1.10788C12.9527 1.03666 12.7684 1 12.5823 1C12.3962 1 12.2119 1.03666 12.0399 1.10788C11.868 1.17911 11.7117 1.2835 11.5801 1.41511V1.41511Z" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12.4707 10.1764V12.4706C12.4707 12.8762 12.3096 13.2652 12.0227 13.552C11.7359 13.8389 11.3469 14 10.9413 14H2.52943C2.1238 14 1.73478 13.8389 1.44796 13.552C1.16114 13.2652 1 12.8762 1 12.4706V4.05872C1 3.65309 1.16114 3.26408 1.44796 2.97726C1.73478 2.69043 2.1238 2.5293 2.52943 2.5293H4.82357" stroke="#1E87C8" stroke-linecap="round" stroke-linejoin="round"/></svg></a> <a onclick="return confirm('Are you sure?')" href="{{ url('proposal').'/'.$proposal->id }}" class="table-btn del p-1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13" fill="none">
                                    <path d="M13.4831 2.25174L11.4311 0.200474C11.3677 0.136814 11.2923 0.0863273 11.2093 0.0519216C11.1262 0.0175159 11.0372 -0.000129623 10.9474 7.16829e-07H2.73684C2.64698 -0.000129623 2.55797 0.0175159 2.47495 0.0519216C2.39193 0.0863273 2.31654 0.136814 2.25311 0.200474L0.20116 2.25174C0.137232 2.31515 0.0865324 2.39062 0.0520013 2.47378C0.0174701 2.55693 -0.00020481 2.64612 1.79047e-06 2.73616V11.6316C1.79047e-06 12.3863 0.613739 13 1.36842 13H12.3158C13.0705 13 13.6842 12.3863 13.6842 11.6316V2.73616C13.6844 2.64612 13.6667 2.55693 13.6322 2.47378C13.5977 2.39062 13.547 2.31515 13.4831 2.25174ZM3.02011 1.36842H10.6641L11.3476 2.05195H2.33658L3.02011 1.36842ZM1.36842 11.6316V3.42037H12.3158L12.3172 11.6316H1.36842Z" fill="#DB7570"/>
                                    <path d="M8.89556 6.84205H4.7903V5.47363H3.42188V8.21047H10.264V5.47363H8.89556V6.84205Z" fill="#DB7570"/>
                                </svg></a>
                            </td>
                    </tr>
                <?php
                    $i++;
                ?>
                @endforeach
                </tbody>
            </table>
        </div>
        <p>Running out of Proposals? You can upgrade to <strong class="blue-clr">Solo Plan</strong> or Buy more Proposals any time.</p>
        <div><a href="#" class="btn green btn-success btn-sm my-0 ps-3 pe-3 text-uppercase">UPGRADE TO SOLO PLAN</a></div>
        <div><a href="#" class="btn blue btn-success btn-sm my-3 ps-4 pe-4 text-uppercase">BUY MORE PROPOSALS</a></div>
    </div>
    <!--Container Main end-->
@endsection


@section('js_links')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src=" https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
@endsection
@section('js')
    <script>
        // $(document).ready(function () {
        //     $('#proposal_list_table').DataTable();
        // });

        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date( data[4] );

                if (
                    ( min === null && max === null ) ||
                    ( min === null && date <= max ) ||
                    ( min <= date   && max === null ) ||
                    ( min <= date   && date <= max )
                ) {
                    return true;
                }
                return false;
            }
        );

        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        $(document).ready(function() {

            var table = $('#proposal_list_table').DataTable( {
                dom: "<'bg-light mt-4 dashboard-nav d-flex align-items-center ps-3 pe-3'<'right-box'l><'ms-auto col-md-3'f>>",
                "ordering": false,
                initComplete: function () {
                    this.api().columns([1,2,3]).every( function (d) {//THis is used for specific column
                        var column = this;
                        var theadname = $('#proposal_list_table th').eq([d]).text();
                        var select = $('<span class="p-3 last-day"><select class="mx-1"><option value="'+d+'">'+theadname+': All</option></select></span>')
                            .appendTo( '#proposal_list_table_length' )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column
                                    .search( val ? '^'+val+'$' : '', true, false )
                                    .draw();
                            } );
                        column.data().unique().sort().each( function ( d, j ) {
                            var val = $('<div/>').html(d).text();
                            select.append( '<option value="'+val+'">'+val+'</option>' )
                        } );
                    } );
                }
            } );

            // Refilter the table
            $('#min, #max').on('change', function () {
                table.draw();
            });
        } );
    </script>
    <script>
        jQuery('.mob-view-icon img').click(function() {
            jQuery(this).toggleClass('active');
            jQuery(this).parent().next("td.action-bar").toggleClass('show');
        });


        jQuery('.dashboard-nav .pe-2 img').click(function() {
            jQuery('span.last-day').toggleClass('show');

        });


        // $(document).ready(function() {

            // DataTables initialisation
            // var table = $('#proposal_list_table').DataTable();


        // });
        $(document).ready(function() {
            $( ".dataTables_length" ).addClass( "d-flex" );
        } );
    </script>
@endsection



