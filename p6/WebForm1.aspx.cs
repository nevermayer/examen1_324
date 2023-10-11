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
    public partial class WebForm1 : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            string connectionString = "Server=localhost;Database=midb_ramos;Uid=root;Pwd=;";
            MySqlConnection connection = new MySqlConnection(connectionString);

            try
            {
                connection.Open();
                Console.WriteLine("Conexión exitosa a MySQL.");

                string consultaSQL = "SELECT * FROM personas";
                MySqlCommand cmd = new MySqlCommand(consultaSQL, connection);

                using (MySqlDataReader reader = cmd.ExecuteReader())
                {
                    while (reader.Read())
                    {
                        Response.Write(reader["nombres"].ToString() + ", " + reader["paterno"].ToString()+"<br>");
                    }
                }

                connection.Close();
            }
            catch (MySqlException ex)
            {
                Response.Write("Error al conectar a MySQL: " + ex.Message);
            }
        }

        protected void Button1_Click(object sender, EventArgs e)
        {
            System.Console.WriteLine("hola");
        }
    }
}