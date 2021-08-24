

    

     <p><a href="{{ route("user.search_doc_user") }}">Return to Search view</a></p>
     <div id="search_resultst">

          <p>
               @for($i = 0; $i <count($document_ids); $i++)
                    @foreach ($documents as $doc)
                         @if($doc->id == $document_ids[$i])
                              <div>
                                   Model : {{ $doc->model->model_name }} <br>
                                   @foreach ( $doc->metadonneesData as $d)
                                        {{$d->name  }} :
                                        @for($j = 0; $j < count($values); $j++)
                                             @if ($values[$j]->document_id == $doc->id && $values[$j]->metadonnees_id == $d->id)
                                                  {{ $values[$j]->value}}
                                              @endif
                                        @endfor
                                         <br>
                                   @endforeach
                                   @for($k = 0; $k < count($files); $k++)
                                        @if($doc->id == $files[$k]->document_id )
                                             <a download="{{ $files[$k]->name }}" href="{{ Storage::url('uploads/'.$files[$k]->name) }}" >
                                             {{ $files[$k]->name }}  
                                        </a><br>
                                        @endif 
                                    @endfor
                              </div>
                               <hr>  
                         @endif
                    @endforeach
               @endfor
          </p>
          <p >Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti impedit modi nobis dicta repudiandae fugiat soluta quas repellat? Natus illo a recusandae veritatis, repellendus obcaecati maiores quo maxime sed laborum!
               Debitis dicta nam, expedita deserunt dignissimos dolor ab soluta at dolores esse rem eius dolore aliquid officiis aspernatur recusandae ipsa impedit consectetur unde nisi consequuntur adipisci! Non quae beatae eveniet?
               Minima amet ea perspiciatis voluptates ipsam eum, rem fugiat consequuntur! Iusto, magni! Blanditiis nulla expedita commodi quam, numquam animi facilis aliquid sunt culpa natus dolorum eius sequi eum debitis fuga.
               Nihil, optio! Error nulla qui esse numquam earum eos necessitatibus delectus, odio neque vel veniam minus aliquam sed nobis assumenda hic ex quisquam incidunt quod accusantium corporis distinctio. Obcaecati, perferendis?
               At quod ab recusandae deleniti et eaque minus nisi sint accusamus illum magni vero id, commodi nostrum in? Impedit in exercitationem natus soluta corporis. Repellendus ipsam deleniti illum quod minus!
               Distinctio sunt consectetur deserunt nobis a neque similique atque, dicta sint unde quia eum obcaecati explicabo assumenda tenetur, quae itaque facilis nostrum ratione porro eligendi repellendus repudiandae. Fugiat, quia veritatis.
               Nemo alias assumenda repellendus dicta incidunt facere vero neque aspernatur cupiditate laudantium qui dolorem adipisci, blanditiis eum modi ut accusamus eius illum corporis inventore enim obcaecati fugiat? Suscipit, eum quos!
               Explicabo accusantium nihil culpa nemo praesentium similique eligendi architecto officia perferendis in aliquam debitis doloremque consequatur expedita eaque eos dolores beatae aspernatur, quis, fugiat minima aliquid esse! Ex, commodi rem.
               Iste maxime atque soluta aperiam odit! Nobis autem blanditiis a molestiae praesentium consectetur, deserunt pariatur qui facere beatae provident ducimus voluptatem ab, officiis, odit animi enim necessitatibus tempora! Molestias, voluptas!
               Nemo sint totam nostrum voluptatibus perferendis ipsa enim eligendi, ea nam natus. Accusamus molestias fugiat, tempore laudantium recusandae consectetur soluta ea quaerat veritatis. Omnis quo repudiandae, placeat eligendi voluptatibus veritatis?
               Accusamus magni voluptatibus odio dolorum qui accusantium quidem commodi? Nulla suscipit incidunt id? Suscipit sed minus commodi, non impedit, molestias placeat tenetur nihil laudantium quo voluptatem necessitatibus, blanditiis nostrum fuga.
               Ipsa numquam nisi alias ullam aperiam cupiditate ducimus iusto soluta iste maiores exercitationem excepturi ipsam voluptas eius dolor error recusandae suscipit adipisci, deleniti earum saepe sequi officiis! Sunt, explicabo ab.
               Provident placeat repellendus quia neque dicta assumenda, a harum ratione doloremque sapiente velit ullam earum libero consequatur cum cupiditate doloribus odit eius dolores voluptate! Iste eum facere ut blanditiis minus.
               Provident, repudiandae dignissimos. Neque dolor perspiciatis ut mollitia tempora qui culpa eligendi cumque, iusto consequuntur optio architecto dolore repellendus itaque sint nam sequi veniam repudiandae blanditiis inventore libero cum rerum.
               Animi molestias ea, expedita cum eaque error nesciunt commodi hic culpa inventore, quae obcaecati vitae iste repudiandae dolorum sed praesentium velit quisquam veritatis fuga. Cupiditate consequatur eum nisi accusamus fuga?</p>
     
              
     </div>
   

