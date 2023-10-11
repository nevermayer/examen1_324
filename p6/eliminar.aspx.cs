using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebApplication1
{
    public partial class eliminar : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string id = Request.QueryString["id"];

            if (!string.IsNullOrEmpty(id))
            {
                string connectionString = "Server=localhost;Database=midb_ramos;Uid=root;Pwd=;";
                MySqlConnection connection = new MySqlConnection(connectionString);
                try
                {
                    connection.Open();
                    Console.WriteLine("Conexión exitosa a MySQL.");

                    string consultaSQL = "DELETE FROM estudiante WHERE id_persona = '" + id+"'";
                    //MySqlCommand cmd = new MySqlCommand(consultaSQL, connection);
                    using (MySqlCommand cmd1 = new MySqlCommand(consultaSQL, connection))
                    {
                        cmd1.ExecuteNonQuery();
                    }
                    consultaSQL = "DELETE FROM personas WHERE id_persona = '" + id + "'";
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