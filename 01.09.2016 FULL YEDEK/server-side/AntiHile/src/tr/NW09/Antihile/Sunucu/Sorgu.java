package tr.NW09.Antihile.Sunucu;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.HashMap;

import com.google.gson.JsonObject;
import com.google.gson.JsonParser;

import tr.NW09.Antihile.Plugin.StatikDegerler;

public class Sorgu {
	private String Adres;
	private HashMap<String,String> PostData = new HashMap<String,String>();
	public Sorgu(String Site){
		Adres = Decrypter.LocalDecrypt(Site);
	}
	public void ParametreEkle(String Key,String Data){
		if(PostData.containsKey(Key)){
			return;
		}
		PostData.put(Key, Data);
	}
	public JsonObject run() throws Exception{
		URL obj = new URL(Adres);
		HttpURLConnection con = (HttpURLConnection) obj.openConnection();

		//add reuqest header
		con.setRequestMethod("POST");
		con.setRequestProperty("User-Agent", "Anti-Hile V" + StatikDegerler.Plugin.getDescription().getVersion());
		String urlParameters = "";
		for (String key : PostData.keySet()) {
			if(urlParameters == ""){
				urlParameters += key + "=" + PostData.get(key);
			}else{
				urlParameters += "&" + key + "=" + PostData.get(key);
			}
		}
		con.setDoOutput(true);
		DataOutputStream wr = new DataOutputStream(con.getOutputStream());
		wr.writeBytes(urlParameters);
		wr.flush();
		wr.close();

		int responseCode = con.getResponseCode();

		BufferedReader in = new BufferedReader(
		        new InputStreamReader(con.getInputStream()));
		String inputLine;
		StringBuffer response = new StringBuffer();

		while ((inputLine = in.readLine()) != null) {
			response.append(inputLine);
		}
		in.close();
		JsonParser parser = new JsonParser();
		JsonObject Cevapjson = (JsonObject) parser.parse(Decrypter.LocalDecrypt(DataFinder(response.toString())));
		return Cevapjson;

	}
    private String DataFinder(String Data) {
        if(Data.trim().split("<cevap>").length == 1) return Data;
        Data = Data.trim().split("<cevap>")[1].split("</cevap>")[0];
        return Data;
    }
}