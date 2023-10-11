using MySql.Data.MySqlClient;
using System;

namespace WebApplication1
{
    public partial class agrega : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string id= Request.Form["cuenta"];
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

                    string consultaSQL = "INSERT INTO personas (id_persona,nombres,paterno,materno,fec_nac,sexo) VALUES ('"+id+"','"+ nombre + "','"+ paterno + "','"+ materno + "','"+fec_nac+"','"+sexo+"')";
                    using (MySqlCommand cmd1 = new MySqlCommand(consultaSQL, connection))
                    {
                        cmd1.ExecuteNonQuery();
                    }
                    consultaSQL = "INSERT INTO estudiante (id_persona) VALUES ('"+id+"')";
                    using (MySqlCommand cmd2 = new MySqlCommand(consultaSQL, connection))
                    {
                        cmd2.ExecuteNonQuery();
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