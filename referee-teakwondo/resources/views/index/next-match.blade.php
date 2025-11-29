<div class="site-section bg-dark" data-aos="fade-up" data-aos-duration="500">
    <div class="container" data-aos="fade-up" data-aos-duration="600">
        <div class="row" data-aos="fade-up" data-aos-duration="700">
            <div class="" data-aos="fade-up" data-aos-duration="800">

                <div class="widget-next-match" data-aos="fade-up" data-aos-duration="900">
                    <table class="table custom-table" data-aos="fade-up" data-aos-duration="1000">
                        <thead data-aos="fade-down" data-aos-duration="1100">
                            <tr>
                                <th>P</th>
                                <th>Referee</th>
                                <th>Degree</th>
                                <th>Gender</th>
                                <th>BirthYear</th>
                                <th>Province</th>
                            </tr>
                        </thead>
                        <tbody data-aos="fade-up" data-aos-duration="1200">
                            @foreach($referees as $referee)
                            <tr data-aos="fade-up" data-aos-duration="1300">
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
                    
                </div>
                

            </div>
        </div>
    </div>
</div>
<div id="our-blog"></div> <!-- .site-section -->