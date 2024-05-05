@props(['listing'])

@php
$created = $listing->created_at->toDateString();  
$name = \App\Models\User::find($listing->user_id)->name;

    use Illuminate\Support\Str;
    $string = $listing->description;
    $substring = Str::substr($string, 0, 200) . "...";

@endphp

<x-card class="">


<div class="pf-card">
    <div class="pf-image">
        <a href="../stacks/"><img src="{{ asset('images/bebiluni.jpeg') }}"></a>
    </div>
    <div class="pf-about">
        
            {{-- <a href="/listings/{{$listing->id}}" ></a>     --}}
                <h3>{{$listing->title}}</h3>    
        
        <p>
            
            {{$substring}}
        </p>
        <x-tags-card :tagsCsv="$listing->tags"/>
        <div class="two-cta">
            <a class="btn" href="../stacks/">View Website</a>

            <a href="https://youtu.be/ef9zFZGNAsM?si=Rd_xrvvZ8-U90nxG" target="_blank" savefrom_lm_index="0"
                savefrom_lm="1"><svg class="yt-link-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                    <path
                        d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                    </path>
                </svg></a><span style="padding: 0; margin: 0; margin-left: 5px;"><a
                    href="http://savefrom.net/?url=https%3A%2F%2Fyoutu.be%2Fef9zFZGNAsM%3Fsi%3DRd_xrvvZ8-U90nxG&amp;utm_source=chrome&amp;utm_medium=extensions&amp;utm_campaign=link_modifier"
                    target="_blank" title="Get a direct link" savefrom_lm="1" savefrom_lm_is_link="1"
                    style="background-image: url(&quot;data:image/gif;base64,R0lGODlhEAAQAOZ3APf39+Xl5fT09OPj4/Hx8evr6/3+/u7u7uDh4OPi497e3t7e3/z8/P79/X3GbuXl5ubl5eHg4WzFUfb39+Pj4lzGOV7LOPz7+/n6+vn5+ZTLj9/e387Ozt7f3/7+/vv7/ISbePn5+m/JV1nRKXmVbkCnKVrSLDqsCuDh4d/e3uDn3/z7/H6TdVeaV1uSW+bn5v39/eXm5eXm5kyHP/f39pzGmVy7J3yRd9/f3mLEKkXCHJbka2TVM5vaZn6Wdfn6+YG/c/r5+ZO/jeLi41aHTIeageLn4f39/vr6+kzNG2PVM5i+lomdf2CXYKHVmtzo2YXNeDqsBebl5uHh4HDKWN3g3kKqEH6WeZHTXIPKdnSPbv79/pfmbE7PHpe1l4O8dTO5DODg4VDLIlKUUtzo2J7SmEWsLlG4NJbFjkrJHP7+/VK5Nfz8+zmnC3KKa+Hg4OHh4Y63j/3+/eDg4Ojo6P///8DAwP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAHcALAAAAAAQABAAAAfWgHd2g4SFhYJzdYqLjIpzgx5bBgYwHg1Hk2oNDXKDFwwfDF5NLmMtcStsn4MhGT8YS04aGmU1QRhIGYMTADQAQlAODlloAMYTgwICRmRfVBISIkBPKsqDBAREZmcVFhYVayUz2IMHB1dWOmImI2lgUVrmgwUFLzdtXTxKSSduMfSD6Aik48MGlx05SAykM0gKhAAPAhTB0oNFABkPHg5KMIBCxzlMQFQZMGBIggSDpsCJgGDOmzkIUCAIM2dOhEEcNijQuQDHgg4KOqRYwMGOIENIB90JBAA7&quot;); background-repeat: no-repeat; width: 16px; height: 16px; display: inline-block; border: none; text-decoration: none; padding: 0px; position: relative;"></a></span>
        </div>
    </div>
</div>

</x-card>


