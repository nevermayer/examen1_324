using MySql.Data.MySqlClient;
using Org.BouncyCastle.Utilities.Collections;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebApplication1
{
    public partial class editar : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string id = Request.Form["cuenta"];
            string nombre = Request.Form["nombre"];
            string paterno = Request.Form["ap"];
            string materno = Request.Form["am"];
            string fec_nac = Request.Form["fn"];
            string sexo = Request.Form["genero"];

            if (!string.IsNullOrEmpty(id))
            {
                string connectionString = "Server=localhost;Database=midb_ramos;Uid=root;Pwd=;";
                MySqlConnection connection = new MySqlConnection(connectionString);
                try
                {
                    connection.Open();
                    Console.WriteLine("Conexión exitosa a MySQL.");
                    string consultaSQL = "UPDATE personas SET nombres = '" + nombre + "', paterno = '" + paterno + "', materno = '" + materno + "', fec_nac = '" + fec_nac + "', sexo = '" + sexo + "' WHERE id_persona = '"+id+"'";
                     
                    using (MySqlCommand cmd1 = new MySqlCommand(consultaSQL, connection))
                    {
                        cmd1.ExecuteNonQuery();
                    }
                    connection.Close();
                }
                catch (MySqlException ex)
                {
                    Response.Write("Error al conectar a MySQL: " + ex.Message);
                }
            }
           Response.Redirect("index.aspx");
        }
    }
}