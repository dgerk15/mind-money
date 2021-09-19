@extends('helpers.layout')

{{--@section('title')@parent:: {{ $title }} @endsection--}}

@section('header')
    @parent
@endsection

@section('content')
    <div class="row">
        <div class="container">
            @auth
                @if (count($finances))
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Название</th>
                            <th scope="col">Категория</th>
                            <th scope="col">Тип</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Комментарий</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($finances as $finance)
                            <tr>
                                <td>{{ $finance->title }}</td>
                                <td>{{ $finance->category->title }}</td>
                                <td>{{ $finance->type }}</td>
                                <td>{{ $finance->cost }}</td>
                                <td>{{ $finance->getRecordDate() }}</td>
                                <td>
                                <span class="area-body">
                                    {{ $finance->description }}
                                </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="mt-3 mb-3">
                        Тут еще ничего нет
                    </div>
                @endif

                    <a href="{{ route('finance.create') }}" class="btn btn-outline-primary">Расход</a>
                    <a href="{{ route('finance.create', ['type' => 'income']) }}" class="btn btn-outline-primary">Доход</a>
            @endauth

            @guest
                <div class="justify-content-evenly">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ad adipisci blanditiis dolor dolore
                    doloremque laborum, modi nam non omnis, porro quae quis ratione repellendus repudiandae sint sit
                    ullam vero, vitae voluptates. A ab adipisci animi aperiam asperiores aspernatur consequatur culpa,
                    cum dignissimos doloremque ea earum eum expedita harum illo illum in incidunt ipsum maiores mollitia
                    omnis perspiciatis placeat provident quae quaerat quibusdam quidem quisquam quo quod rem repellat
                    repudiandae saepe soluta velit voluptas voluptatem voluptatum? Consectetur consequuntur culpa dicta
                    exercitationem inventore labore, mollitia possimus tempore! Blanditiis corporis dolore earum esse
                    expedita mollitia nihil saepe? Atque dignissimos dolores eaque exercitationem illum mollitia
                    officiis, quia quidem repellendus rerum unde, ut! Aperiam earum hic in officiis provident quam quos
                    voluptas. Consectetur corporis culpa cumque, dicta distinctio eum facere hic illum iste minus nobis
                    nulla officia placeat porro qui quisquam repudiandae, ullam, veniam veritatis voluptatem. Aut,
                    consequatur est! Animi at beatae consequatur, deserunt ducimus eveniet harum ipsa iusto magni,
                    minima non, numquam omnis quasi recusandae voluptatem! Ad amet aperiam asperiores assumenda atque
                    cupiditate debitis delectus earum, eius expedita facilis hic ipsum iure nam necessitatibus nulla,
                    obcaecati, perferendis possimus quaerat recusandae sapiente sunt veritatis vitae voluptas
                    voluptatibus. Aperiam asperiores, cupiditate doloribus eius enim hic saepe totam voluptatem. Alias
                    eos perspiciatis quisquam voluptatum. Ab animi commodi debitis dolorem doloremque eaque, error
                    itaque minima necessitatibus odit, quo sit, veniam voluptatem! Dicta dolorum eveniet fugiat impedit,
                    iusto laudantium perferendis praesentium recusandae repudiandae tempora unde vel voluptatum. A
                    accusantium ad culpa debitis dolor fuga laudantium maiores minima, pariatur quaerat quam qui quis
                    quo reprehenderit rerum saepe tenetur. Accusamus adipisci assumenda atque aut autem, cupiditate
                    dolorem dolorum enim error eveniet expedita hic inventore laudantium necessitatibus nesciunt nobis
                    odio optio praesentium quaerat quia similique temporibus unde vel. Aperiam cupiditate dolore dolores
                    doloribus excepturi expedita, ipsam maxime suscipit. Adipisci cum distinctio doloribus et impedit
                    laboriosam magnam magni, mollitia. Animi corporis culpa cupiditate dignissimos earum error esse,
                    ipsa magni minus nobis quam qui sapiente sequi soluta sunt tempore veniam voluptate voluptates!
                    Aliquid autem corporis cupiditate eligendi fuga in, maiores non odio omnis, sunt vel, vitae?
                    Accusantium asperiores aspernatur beatae, cum distinctio dolores eaque excepturi fuga hic illum
                    ipsum laudantium molestiae natus necessitatibus nemo neque nihil non placeat praesentium quo ratione
                    recusandae repellat repellendus reprehenderit rerum tempore veritatis vero voluptate voluptates
                    voluptatibus. Deserunt iure nisi quas? Assumenda consectetur delectus, deleniti earum eius enim et,
                    eveniet ex excepturi exercitationem inventore iusto laboriosam laudantium numquam officia omnis
                    optio quaerat quisquam quod quos repellat sapiente temporibus! Ab aliquid animi aperiam atque beatae
                    culpa cum cumque deserunt dicta dolore esse eum facilis illo incidunt ipsa ipsam laboriosam
                    laudantium magni officiis placeat possimus, praesentium quae quas quasi qui quisquam rem repudiandae
                    rerum sapiente sed totam, unde ut vel velit vero vitae voluptate! Beatae ex molestias saepe sit ut?
                    Doloremque explicabo maiores, molestiae nam nemo obcaecati quod sequi soluta tempore vel veniam vero
                    voluptatem! Accusamus aliquam dolorum ea facere labore officia optio perferendis perspiciatis qui
                    reprehenderit soluta tenetur veniam, voluptate. Consequatur cum, cupiditate deserunt dignissimos
                    dolores dolorum eveniet harum, inventore itaque laudantium nostrum obcaecati omnis quasi similique,
                    sint temporibus ut vero. Ab, accusamus commodi eum fuga id, laborum magni officia pariatur
                    perspiciatis quia quo soluta sunt ut? Dolores eaque esse facere ipsum laboriosam quis recusandae
                    repellat totam. Alias animi aut distinctio doloremque doloribus harum, modi porro! Accusantium
                    dolorum inventore modi nostrum odit sit voluptas! Adipisci aliquid amet atque cupiditate dolore,
                    expedita harum illo impedit ipsum minus nesciunt obcaecati porro praesentium reprehenderit, rerum
                    saepe sequi soluta tempore ullam voluptatum! Ab accusantium asperiores commodi culpa dolor
                    doloremque esse et impedit ipsam quam quas reiciendis, sequi tempore veritatis voluptatibus. Libero
                    sunt, ut!
                </div>
            @endguest
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // alert(111);
    </script>
@endsection
