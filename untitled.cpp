
#include <bits/stdc++.h>
using namespace std;

int main()
{
	int n, count_1=0,count_0=0,count_2=0;
	cin>>n;
	int arr[n];
	int cnt[3] = {0,0,0};

	for(int i=0;i<n;i++)
       {
              cin>>arr[i];
              if(arr[i] == 0)
              {
                     count_0++;
              }
              else if(arr[i] == 1)
              {
                     count_1++;
              }
              else
              {
                     count_2++;
              }
       }
       for(int j =0;j<count_1;j++)
       {
              cout<<1<<" ";
       }
       for(int j =0;j<count_0;j++)
       {
              cout<<0<<" ";
       }
       for(int j =0;j<count_2;j++)
       {
              cout<<2<<" ";
       }
}


