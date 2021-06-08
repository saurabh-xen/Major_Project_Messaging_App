
#include <bits/stdc++.h>
using namespace std;


int main()
{
	int n,m;
	cin>>n;
	vector<int> v1;

       if(n>1000000)
       {
              cout<<"Wrong Input";
       }
       else
       {


	while(n>0)
        {
              m=n%10;
              n=n/10;
              v1.push_back(m);
       }

       for(int i=v1.size()-1;i>=0;i--)
       {
              cout<<9-v1[i];
       }
       }
}



