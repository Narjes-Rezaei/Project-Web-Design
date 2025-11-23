       <div class="site-section bg-dark">
            <div class="container">
                <div class="row">
                    <div class=>

                        <div class="widget-next-match">
                            <table class="table custom-table">
                                <thead>
                                    <tr>
                                        <th>P</th>
                                        <th>Referee</th>
                                        <th>Degree</th>
                                        <th>Gender</th>
                                        <th>BirthYear</th>
                                        <th>Province</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($referees as $referee)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td><strong class="text-white">{{ $referee->name }} {{ $referee->family }}</strong></td>
                                        <td> {{ $referee->degree->name }} </td>
                                        <td>{{ $referee->gender->name }}</td>
                                        <td>{{ $referee->birth_year }}</td>
                                        <td>{{ $referee->province->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="our-blog"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div> <!-- .site-section -->
