@component('layouts.site')

<div class="container">


    <div class="text-center my-5">
        <h3 style="color: orange">Pour chaque filleul parrainé.</h3>
        <span class="tag is-info is-large">Gangnez une Smartbox d'une valeur de 100€</span>
    </div>

    <div class="box text-center mb-5">
        <h3 class="title is-3 mb-2">C'est facile de parrainer</h3>

        <div class="columns">
            <div class="column ">
                <span class="fa-stack fa-2x mb-2">
                    <i class="far fa-circle fa-stack-2x"></i>
                    <i class="fa  fa-stack-1x">1</i>
                </span>
                <p><strong>Invitez votre réseau</strong>par email, via réseau sociaux ou en partageant votre lien</p>
            </div>
            <div class="column">
                <span class="fa-stack fa-2x  mb-2">
                    <i class="far fa-circle fa-stack-2x"></i>
                    <i class="fa  fa-stack-1x">2</i>
                </span>
                <p>Votre filleul s'inscrit et nous confie une première négociation</p>
            </div>
            <div class="column ">
                <span class="fa-stack fa-2x  mb-2">
                    <i class="far fa-circle fa-stack-2x"></i>
                    <i class="fa  fa-stack-1x">3</i>
                </span>
                <p>Une SMARTBOX d'une valeur de 100€ vous sera remise dès sa première négociation aboutie</p>
            </div>
        </div>

    </div>

    <div>
        <h3 class="title is-3 mb-5">Invitez de nouvelles personnes</h3>

        <div class="columns">

            <div class="column is-8">

                <div class="field">
                    <label class="label">En copiant votre lien de pararainage</label>
                    <div class="control has-icons-left">
                        <input class="input is-success" type="text" value="{{ $sponsor_link }}">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <form action="{{ route('sponsors.invite')}}" method="post">
                    @csrf

                    <div class="field">
                        <label class="label">En copiant votre lien de pararainage</label>

                        <div class="field is-grouped">
                            <p class="control is-expanded">
                                <input class="input" name="sponsor_mail" type="text" placeholder="client@example.fr">
                            </p>
                            <p class="control">
                                <button type="submit" class="button is-info">Envoyer</button>
                            </p>
                        </div>
                        @error('sponsor_mail')
                        <p class="help is-danger">{{ $message }}</p>
                        @enderror
                        @if (session('notification_mail'))
                        <p class="help is-success">{{ session('notification_mail')}}</p>
                        @endif
                    </div>

                </form>

            </div>

            <div class="column">

                <div class="px-5">
                    <label class="label">Votre réseau</label>
                    <ul>
                        @foreach ($sponsors as $sponsor)
                        <li>{{ $sponsor->email }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
        {{-- Columns --}}


    </div>



</div>

@endcomponent