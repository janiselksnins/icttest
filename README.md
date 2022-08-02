
<table class="table table-dark">
			<thead>
			    <tr>
				<th class="text-center">URL</th>
				<th class="text-center">Method</th>
				<th class="text-center">Response</th>
			    </tr>
			</thead>
			<tbody>
			    <tr>
				<td>{Server}/api/login?uid=&lt;STRING&gt;&password=&lt;STRING&gt</td>
				<td>GET</td>
				<td>SID iegūšana.<br/> {SID:&lt;STRING&gt;}</td>
			    </tr>
			    <tr>
				<td>{Server}/api/logout/{SID}</td>
				<td>GET</td>
				<td>Sessijas izbeigšana.<br/> {status:&lt;BOOLEAN&gt;, message:&lt;STRING&gt;}</td>
			    </tr>
			    <tr>
				<td>{Server}/api/{SID}/products</td>
				<td>GET</td>
				<td>Visu produktu saraksts.<br/> [{id:&lt;INT&gt;,name:&lt;STRING&gt;,description:&lt;STRING&gt;}]</td>
			    </tr>
			    <tr>
				<td>{Server}/api/{SID}/product/{Product_ID}</td>
				<td>GET</td>
				<td>Produkts ar atribūtiem.<br/> {id:&lt;INT&gt;,name:&lt;STRING&gt;,description:&lt;STRING&gt;,product_attributes: [{&lt;attribute_name&gt;:&lt;attribute_value&gt;}]}</td>
			    </tr>
			    <tr>
				<td>{Server}/api/{SID}/attributes</td>
				<td>GET</td>
				<td>Atribūtu saraksts.<br/> [{id:&lt;INT&gt;,name:&lt;STRING&gt;}]</td>
			    </tr>
			    <tr>
				<td>{Server}/api/{SID}/attribute<br/>
				Data:[{id:&lt;INT&gt;,attribute_name:&lt;STRING&gt;}]</td>
				<td>PUT</td>
				<td>Atribūta pievienošana vai labošana.<br/> {status:&lt;BOOLEAN&gt;, message:&lt;STRING&gt;}<br/>
				 *! Ja id === 0, tiek pievienots jauns atribūts;<br/>
				</td>
			    </tr>
			    <tr>
				<td>{Server}/api/{SID}/product<br/>Data: {id:&lt;INT&gt;,name:&lt;STRING&gt;,description:&lt;STRING&gt;,product_attributes: [{name:&lt;INT&gt;,attribute_name:&lt;STRING&gt;,attribute_val:&lt;STRING&gt;}]}</td>
				<td>PUT</td>
				<td>Produkta pievienošana vai labošana ar atribūtiem.<br/>{status:&lt;BOOLEAN&gt;, message:&lt;STRING&gt;}<br/>
				    *! Ja id === 0, tiek pievienots jauns produkts;<br/>
				    *! Ja product_attributes:name nav atrodams, tiek pievienots jauns atribūta veids.
				</td>
			    </tr>
			    <tr>
				<td>{Server}/api/{SID}/product/{Product_ID}</td>
				<td>DELETE</td>
				<td>Produkta dzēšana.<br/> {status:&lt;BOOLEAN&gt;, message:&lt;STRING&gt;}<br/></td>
			    </tr>
			    <tr>
				<td>{Server}/api/{SID}/attribute/{Attribute_ID}</td>
				<td>DELETE</td>
				<td>Atribūta dzēšana.<br/> {status:&lt;BOOLEAN&gt;, message:&lt;STRING&gt;}<br/></td>
			    </tr>
			</tbody>
		    </table>
