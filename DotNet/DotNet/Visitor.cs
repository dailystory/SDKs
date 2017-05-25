using System;
using System.Collections.Specialized;
using System.Collections.Generic;
using System.Threading.Tasks;
using System.Net;
using System.Web;

namespace DailyStory.SDK.DotNet
{
    public class Visitor
    {
        private string url = "https://{0}.dailystory.com/API/Public/WebToLead/{1}";
        public string DataCenter { get; private set; } = "us-1";
        public string SiteId { get; private set; }
        public string DsId { get; private set; }
        public string Email { get; private set; }
        public string LeadSource { get; private set; }
        public int CampaignId { get; private set; }

        public Dictionary<string, string> Properties { get; set; } = new Dictionary<string, string>();

        /// <summary>
        /// Class constructor for the Visitor object
        /// </summary>
        /// <param name="siteId">The unique site id of the DailyStory site.</param>
        /// <param name="campaignId">The campaign id of the DailyStory site.</param>
        /// <param name="leadSource">Where the lead was sourced from, e.g. 'Login Form'</param>
        /// <param name="email">The email address of the contact</param>
        public Visitor(string siteId, int campaignId, string leadSource, string email)
        {
            // do we have a data center id
            if (siteId.Contains("-"))
            {
                SiteId = siteId.Substring(0, siteId.IndexOf("-"));
                DataCenter = siteId.Substring(siteId.IndexOf("-") + 1);
            }
            else
            {
                SiteId = siteId;
            }

            // get the dsid
            if (null != HttpContext.Current.Request.Cookies["_ds"])
                DsId = HttpContext.Current.Request.Cookies["_ds"].Value.Replace("-", "");

            CampaignId = campaignId;
            Email = email;
            LeadSource = leadSource;
        }

        /// <summary>
        /// Creates a record for this visitor in DailyStory and performs the association between their DailyStory ID and their email address.
        /// </summary>
        public void Convert()
        {
            if (string.IsNullOrEmpty(DsId))
                return;

            using (WebClient client = new WebClient())
            {
                NameValueCollection values = new NameValueCollection();
                Uri httpPostUrl = new Uri(string.Format(url, DataCenter, SiteId));

                // Build the collection using the required values
                values.Add("dsid", DsId);
                values.Add("campaignid", CampaignId.ToString());
                values.Add("email", Email);
                values.Add("LeadSource", LeadSource);

                // Add optional items to collection
                foreach(string key in Properties.Keys)
                {
                    values.Add(key, Properties[key]);
                }

                byte[] response = client.UploadValues(httpPostUrl, values);

            }
        }

        /// <summary>
        /// Creates a record for this visitor in DailyStory and performs the association between their DailyStory ID and their email address.
        /// </summary>
        public async Task ConvertAsync()
        {
            if (string.IsNullOrEmpty(DsId))
                return;

            using (WebClient client = new WebClient())
            {
                NameValueCollection values = new NameValueCollection();
                Uri httpPostUrl = new Uri(string.Format(url, DataCenter, SiteId));

                // Build the collection using the required values
                values.Add("dsid", DsId);
                values.Add("campaignid", CampaignId.ToString());
                values.Add("email", Email);
                values.Add("LeadSource", LeadSource);

                // Add optional items to collection
                foreach (string key in Properties.Keys)
                {
                    values.Add(key, Properties[key]);
                }

                byte[] response = await client.UploadValuesTaskAsync(httpPostUrl, values);

            }
        }
    }
}
